<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPrivacySettingRequest extends FormRequest
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
       
        $this->merge([
            'isAllowedMessage' => $this->isAllowedMessage ?? 1, 
            'acceptImage' => $this->acceptImage ?? 1, 
            'allowUnRegisteredToSendMessage' => $this->allowUnRegisteredToSendMessage ?? 1, 
            'allowToReceiveEmailNotifications' => $this->allowToReceiveEmailNotifications ?? 1,
        ]);
        
        return [
            'isAllowedMessage'=>['boolean'],
            'acceptImage'=>['boolean'],
            'allowUnRegisteredToSendMessage'=>['boolean'],
            'allowToReceiveEmailNotifications'=>['boolean'],
        ];
    }


}
