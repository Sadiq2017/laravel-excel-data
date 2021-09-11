<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcelUploadRequest extends FormRequest
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
            'file' => 'required|mimes:xls,xlsx|max:20000'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Поле файла обязательно для заполнения.',
            'file.mimes' => 'Файл должен быть файлом типа: xls, xlsx.',
            'file.max' => 'Размер файла не должен превышать 20 мегабайт.'
        ];
    }
}
