<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();
        
        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'email' => ['required', 'email'], 
                'address' => ['required'], 
                'city' => ['required'], 
                'state' => ['required'], 
                'postal_code' => ['required'],       
            ];
        }

        return [
            'name' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required', 'email'], 
            'address' => ['sometimes', 'required'], 
            'city' => ['sometimes', 'required'], 
            'state' => ['sometimes', 'required'], 
            'postal_code' => ['sometimes', 'required'],       
        ];
       
    }
}
