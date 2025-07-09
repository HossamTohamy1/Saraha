<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserPrivacySettingRequest;
use App\Http\Resources\UserPrivacySettingResource;
use App\Models\UserPrivacySetting;

class UserPrivacySettingController extends Controller
{
use HttpResponses;
    protected function InitializePrivacySetting(){
        $user = Auth::user();
        UserPrivacySetting::create([
            'user_id'=> $user->id,
        ]);
    }
    public function Show(){
        $user = Auth::user();
        $Setting = UserPrivacySetting::where('user_id', $user->id)->first();
        $Setting= new UserPrivacySettingResource($Setting);
        return $this->Success($Setting);
    }
    public function Update(UserPrivacySettingRequest $request){
        $user = Auth::user();
        $Setting = UserPrivacySetting::where('user_id', $user->id)->first();
        $Setting->update($request->validated());
        $Setting= new UserPrivacySettingResource($Setting);
        return $this->Success($Setting);
    }
}
