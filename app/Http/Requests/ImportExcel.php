<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ImportExcel extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $return[] = [
            'select_file' => 'required|mimes:xls,xlsx',
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
