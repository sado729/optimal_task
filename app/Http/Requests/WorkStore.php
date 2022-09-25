<?php

namespace App\Http\Requests;

use App\Enum\PaymentEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class WorkStore extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $paymentEnumValues = array_column(PaymentEnum::cases(), 'value');
        $return[] = [
            'wo' => 'required|alpha_num|unique:works',
            'work_date' => 'required|date|before_or_equal:'.now()->format('Y-m-d'),
            'parts_cost' => 'required|numeric|between:0,10000.00',
            'payment' => 'required|in:'.implode(',',$paymentEnumValues),
        ];

        return Arr::collapse($return);
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new Response([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validator->errors()
        ], 401);

        throw new ValidationException($validator, $response);
    }
}
