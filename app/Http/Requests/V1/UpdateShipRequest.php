<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('ship::update');
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
                'owner_id' => ['required'],
                'description' => ['required'],       
            ];
        }

        return [          
            'owner_id' => ['sometimes', 'required'],
            'description' => ['sometimes', 'required'],   
        ];
    }
}
