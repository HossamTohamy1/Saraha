<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Treits\HttpResponses;
class StoreMessageRequest extends FormRequest
{
    use HttpResponses;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
        
        return [
            'content' => ['required', 'string', 'max:555'],
            'image' => ['nullable','image', 'max:2048'],
            'anonymous' => ['nullable','boolean'],
        ];
    }
}
