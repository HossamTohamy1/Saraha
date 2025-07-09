<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EmailVerificationRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Notifications\LoginNotification;
use App\Notifications\EmailVerificationNotification;
use App\Notifications\ResetPasswordVerificationNotification;
use Illuminate\Http\Request;
use Ichtrojan\Otp\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserPrivacySettingController;


use App\Treits\HttpResponses;
// use phpDocumentor\Reflection\Location;

class AuthController extends UserPrivacySettingController
{
    use HttpResponses;

    public function Login(LoginUserRequest $request){
        $request->validated();
        if(!Auth::attempt($request->only('email','password'))){
            return $this->Error('','Credentials does not match',401);
        }
        $user = User::where('email', $request->email)->first(); 
        $user->notify(new LoginNotification());
        return $this->Success([
            'user'=>$user,
            'token'=>$user->createToken('Api Tocken of '.$user->name)->plainTextToken
        ]);
    }
    public function Register(StoreUserRequest $request){
        $request->validated($request->all());
        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'age'=>$request->age,
            'password'=>Hash::make($request->password),
        ]
        );
        $user->notify(new EmailVerificationNotification());
        return $this->Success([
            'user'=>$user,
            'token'=>$user->createToken('Api Tocken of '.$user->name)->plainTextToken
        ]);
    }
    public function ResendEmailVerification(request $request){
        $user=$request->user();
        if($user->email_verified_at){
            return $this->Error('','Email already verified',401);
        }
        $user->notify(new EmailVerificationNotification());
        return $this->Success('','Email verification OTP sent successfully');
    }
    public function EmailVerification(EmailVerificationRequest $request){
        $otp= new Otp();
        $otp=$otp->validate($request->email,$request->otp);
        if(!$otp->status){
            return $this->Error('','Invalid OTP',401);
        }
        $user=User::where('email',$request->email)->first();
        $user->email_verified_at=now();
        $user->save();
        $this->InitializePrivacySetting();
        return $this->Success('','Email verified successfully, you can now use your account');
    }
    public function ForgetPassword(ForgetPasswordRequest $request){
        
        $request->validated();
        $user=User::where('email',$request->email)->first();
        $user->notify(new ResetPasswordVerificationNotification());
        return $this->Success('','Reset password OTP sent successfully');
    }
    public function ResetPassword(ResetPasswordRequest $request){
        $request->validated();
        $otp= new Otp();
        $otp=$otp->validate($request->email,$request->otp);
        if(!$otp->status){
            return $this->Error('','Invalid OTP',401);
        }
        $user=User::where('email',$request->email)->first();
        $user->password=Hash::make($request->password);
        $user->save();
        $user->tokens()->delete();
        return $this->Success('','Password reset successfully');
    }
    public function Logout(){
       Auth::user()->currentAccessToken()->delete();
        return $this->Success([
            'message'=>'Logged out successfully'
        ]);
    }
}
