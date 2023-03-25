<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
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
            'user_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'user_address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'payment_gateway' => 'required',
            'transaction_id' => 'required|unique:deposits,transaction_id',
            'deposit_amount' => 'required',
            'agree' => 'required',
        ];
    }
}
