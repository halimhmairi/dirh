<?php

namespace App\Http\Requests\calendar;

use Illuminate\Foundation\Http\FormRequest;

class StoreCalendarRequest extends FormRequest
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
            'start_date'=>['required'],
            'end_date'=>['required'], 
            'reason',
            'status',
            'event_type'=>['required'],
            'user_id'=>['required'],
        ];
    }
}
