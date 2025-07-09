<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;


class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    
        $EmailRules =['string','email','max:255','unique:users'];
        
        if($this->email==Auth::user()->email){
            $EmailRules = ['string','email','max:255'];
           
        }
        if(empty($this->password)){
            return [
                'name' => ['string','max:255'],
                'email' => $EmailRules ,
                'age' => ['integer','max:80'],
                'image' => ['image','max:2048'],
            ];
        }else{

            return [
                'name' => ['string','max:255'],
                'email' => $EmailRules,
                'age' => ['integer','max:80'],
                'image' => ['image','max:2048'],
                'password' => ['string','confirmed',Password::defaults()],
            ];
        }
        
    }
}
