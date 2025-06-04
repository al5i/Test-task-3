<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            'external_code' => 'max:255',
            'number' => 'max:255',
            'status' => 'max:255',
            'title' => 'max:255',
            'date' => 'date_format:Y-m-d H:i:s',
        ];
    }

    public function messages()
    {
        return [
            'number.nullable' => 'Поле заголовка обязательно для заполнения.',
            'number.string' => 'Заголовок должен быть строкой.',
            'number.max' => 'Поле не должено превышать :max символов.',
            'status.nullable' => 'Содержимое обязательно для заполнения.',
            'status.max' => 'Содержимое не должено превышать :max символов.',
            'title.nullable' => 'Поле заголовка обязательно для заполнения.',
            'title.max' => 'Заголовок не должен превышать :max символов.',
            'date.nullable' => 'Содержимое обязательно для заполнения.',
            'date.date_format' => 'Дата должна быть в формате :Y-m-d H:i:s.',
        ];
    }
}
