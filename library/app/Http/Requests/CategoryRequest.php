<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|max:50|regex:/\w+\s/',
            'description'=>'required|min:50|max:500;',
        ];
    }
    public function messages(){
       return[
        'name.regex'=>'Tên không được chứa kí tự đặc biệt',
        'name.required'=>'Tên danh mục không được để trống',
        'name.max'=>'Tên không được quá 50 kí tự',
        'description.required'=>'Description không được để trống',
        'description.min'=>'description phải lớn hơn 50 kí tự',
        'description.max'=>'description không được quá 300 kí tự',
        ];
    }
}
