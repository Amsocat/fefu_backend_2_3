<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppealPostRequest extends FormRequest
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
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:40'],
            'patronymic' => ['nullable', 'string', 'max:20'],
            'age' => ['required', 'integer', 'between:14, 123'],
            'gender' => ['required', Rule::in([Gender::MALE, Gender::FEMALE])],
            'message' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'required_without:email', 'string', 'regex:/^((\+7)|7|8){1} \(\d{3}\) \d{2}-\d{2}-\d{3}$/'],
            'email' => ['nullable', 'required_without:phone', 'string', 'max:100', 'regex:/^[\w\.-]+@\w+\.\w+\b$/']
        ];
    }
}
