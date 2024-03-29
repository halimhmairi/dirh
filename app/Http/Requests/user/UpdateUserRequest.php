<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
  
        return [
            'name' => ['required', 'string', 'max:255'], 
            'id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(request()->id)],
            'phone_number' => ['required'],
            'status' => ['required'],
            'avatar' => [''],
            'role_id' => ['required'], 
            'department_id' => ['required']
        ];
    }
}
