<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartment extends FormRequest
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
            'name'=>'required||unique:departments',
            'description'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required'=>__('Name of department is required'),
            'description.required'=>__('Description of department is required'),
            'name.unique'=>__('Name of department already exit, must be unique')
        ];
    }
    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'trim|lowercase',
            'description' => 'trim|capitalize|escape'
        ];
    }
}
