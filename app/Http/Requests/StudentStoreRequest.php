<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success'   => false,
                'message'   => $validator->errors()->first(),
                'data'      => $validator->errors()->first()
            ],
            403


        ));
    }


    public function rules(): array
    {
        return [
            "name" => "required|string|max:255|min:3|unique:students,name",
            "phone" => "required|string|max:14|min:14|unique:students,phone",
            "password" => "required|string|max:255|min:8",
            "age" => "required|integer",
            "gender" => "required|string|max:255|min:4",
            "country" => "required|string|max:255|min:3",
            "city" => "required|string|max:255|min:3",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "main_language" => "required|string|max:255|min:3",
        ];
    }

    // +9467725467765

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

}
