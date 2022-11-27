<?php

namespace App\Http\Requests;

use App\Exceptions\Api\ApiValidationException;
use App\Rules\Isbn;
use App\Rules\Offset;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Responses\ValidationErrorResponse;

class GetBooksBestSellersRequest extends FormRequest
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
            'author' => 'string',
            'isbn' => [
                'string',
                new Isbn(),
            ],
            'title' => 'string',
            'offset' => [
                'numeric',
                new Offset(),
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ApiValidationException(
            response()->apiValidationError($validator->errors())
        );
    }
}
