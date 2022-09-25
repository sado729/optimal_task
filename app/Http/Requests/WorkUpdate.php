<?php

namespace App\Http\Requests;

use App\Enum\PaymentEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class WorkUpdate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $paymentEnumValues = array_column(PaymentEnum::cases(), 'value');
        $return[] = [
            'wo' => 'alpha_num',
            'work_date' => 'date|before_or_equal:'.now()->format('Y-m-d'),
            'parts_cost' => 'numeric|between:0,10000.00',
            'payment' => 'in:'.implode(',',$paymentEnumValues),
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
