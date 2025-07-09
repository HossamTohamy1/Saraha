<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Treits\HttpResponses;
class UserController extends Controller
{
    use HttpResponses;
    public function index(){
        $users= new UserCollection(User::all());
        return $this->Success([
            "user"=> $users
        ]);
    }
    public function show(){
        $user= new UserResource(Auth::user());
        return $this->Success([
            "user"=> $user
        ]);
    }
    public function update(UpdateUserRequest $request){
        $data= $request->validated();
        
        if($request->hasFile("image")){
            if(request()->user()->image!=null){
                
                $data["image"]= StoreImage($data['image'],'UsersImages',request()->user()->image);
            }else{
                
                $data["image"]= StoreImage($data['image'],'UsersImages');
            }
        }
        $user= request()->user();
        $user->update($data);
        $user= new UserResource( Auth::user());
        return $this->Success([
            "user"=> $user
        ]);
         
     
    }
}
