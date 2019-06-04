<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            
            'name'=>'required|unique:products,name|regex:/\w+\s/',
            'description'=>'required|min:30',
            'unit_price'=>'required|regex:/[0-9]/',
            'Promotion_price'=>'required|regex:/[0-9]/',
            'Image'=>'Required|image|mimes:jpeg,png,jpg,gif',

        ];
    }
    public function messages(){
        return[
            'quantity.required'=>'vui long chon so luong',
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'name.regex'=>'Tên không được chứa kí tự đặc biệt',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'Type.required'=>'Vui lòng chọn danh mục cho sản phẩm',
            'description.required'=>'Vui lòng nhập description cho sản phẩm',
            'description.min'=>'Description phải nhiều hơn 30 kí tự',
            'unit_price.required'=>'Vui lòng nhập giá sản phẩm',
            'unit_price.regex'=>'Giá sản phẩm chỉ được nhập số',
            'Promotion_price.required'=>'Nếu sản phẩm không có khuyến mãi , vui lòng nhập số 0',
            'Promotion_price.regex'=>'Giá sản phẩm chỉ được nhập số',
            'Image.required'=>'Vui lòng chọn hình ảnh',
            'Image.image'=>'file chọn phải là file ảnh',
            'Image.mimes'=>'hình ảnh phải có đuôi:jpeg , png , jpg , gif',
        ];

    }
}
