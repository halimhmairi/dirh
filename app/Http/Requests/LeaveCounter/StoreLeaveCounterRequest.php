<?php

namespace App\Http\Requests\LeaveCounter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreLeaveCounterRequest extends FormRequest
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
            "leave_type_id"=>"required |".Rule::unique('leave_counters')
                                ->where('user_id',request()->user_id)
                                ->where('leave_type_id',request()->leave_type_id)
                                ->whereNull('deleted_at'),
            "total"=>["required"], 
            "user_id"=>["required"],
        ];
    }
}
