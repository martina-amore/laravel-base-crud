<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'guest_full_name' => 'required|string|min:3',
            'guest_credit_card' => 'required|numeric|min:3',
            'room' => 'required|numeric',
            'from_date' => 'required',
            'to_date' => 'required',
            'more_details' => ''
        ];
    }
}
