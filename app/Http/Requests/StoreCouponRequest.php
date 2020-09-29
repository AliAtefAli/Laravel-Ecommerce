<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'code' => 'required|min:3|max:255|unique:coupons',
            'product_id' => 'required',
            'amount' => 'required|int',
            'discount_type' => 'required',
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'min_spend' => 'required',
            'max_spend' => 'required',
        ];
    }
}
