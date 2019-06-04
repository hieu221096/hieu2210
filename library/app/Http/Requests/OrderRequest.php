<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;
use resource\lang\en\validation;

class OrderRequest extends FormRequest
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

           'name'=>'required|regex:/\w+\s/',
           'email'=>'required|email',
           'address'=>'required|regex:/\w+$/',
           'phone'=>'required|numeric|regex:/(0)[0-9]{9}/',
           'notes'=>'max:300',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'vui lòng nhập tên',
            'email.required'=>'Vui lòng nhập email',
            'phone.numeric'=>'Phone chỉ được nhập số',
            'address.required'=>'vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập Số Phone',
            'notes.max'=>'Note Quá Dài',            
            'name.regex'=>'Tên Nhập Phải là Chữ , không có kí tự đặc biệt',
            'email.email'=>'Vui lòng nhập đúng định dạng email',
            'address.regex'=>'Địa chỉ không hợp lệ',
            'phone.regex'=>'vui lòng nhập đúng SDT',
        ];
    }
}
