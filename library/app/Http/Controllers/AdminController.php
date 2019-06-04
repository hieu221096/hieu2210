<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditRequest;
use App\User;
use App\ProductType;
use App\Product;
use App\Bill;
use App\BillDetail;
use Hash;
use Auth;
class AdminController extends Controller
{
    public function getindex(){
    	return view('admin.index-admin');
    }
    public function getUserManager(){
    	$User = User::where('level','<>',1)->get();
    	return view('admin.UserManager' , compact('User'));
    }
    public function getDeleteUser($id){
    	$user=User::find($id);
    	$user->delete();
    	return redirect()->back();
    }
    public function getAddUser(){
    	return view('admin.Add-User');
    }
    public function postAddUser(RegisterRequest $req){
    	$User =  new User();
    	$User->full_name = $req->name;
    	$User->email = $req->email;
    	$User->password = Hash::make($req->password);
    	$User->phone = $req->phone;
    	$User->address = $req->address;
    	$User->level = $req->level;
    	$User->save();
    	return redirect()->route('user-manager')->with('message', 'Add User Susscess');
    }
    public function getCategoryManager(){
        $cate = ProductType::get();
        return view('admin.CategoryManager',compact('cate'));
    }
    public function getDeleteCategory($id){
        $del = ProductType::find($id)->delete();
        return redirect()->route('Category-Manager')->with('message','Xóa Danh mục Thành công');
    }
    public function getAddCategory(){
        return view('admin.Add-Category');
    }
    public function postAddCategory(CategoryRequest $req){
        $cate = new ProductType();
        $cate->name = $req->name;
        $cate->description = $req->description;
        $cate->save();
        return redirect()->route('Category-Manager')->with('message','Thêm danh mục Thành công');
    }
    public function getEditCate($id){
        $EditCate = ProductType::where('id',$id)->get();
        return view('admin.Edit-Category',compact('EditCate'));
    }
    public function postEditCate(CategoryRequest $req , $id){
        $Edit = ProductType::find($id);
        $Edit->name = $req->name;
        $Edit->description = $req->description;
        $Edit->save();
        return redirect()->route('Category-Manager')->with('message','Edit danh mục Thành công');
    }
    public function getProductManager(){
        $Product = Product::orderBy('id')->get();
        return view('admin.ProductManager',compact('Product'));
    }
    public function getDeleteProduct($id){
        $Del = Product::find($id)->delete();
        return redirect()->route('ProductManager')->with('message','Xóa sản phẩm thành công');
    }
    public function getAddProduct(){
        $Product = ProductType::get();
        return view('admin.Add-Product',compact('Product'));
    }
    public function postAddProduct(AddCateRequest $req){
        $Add = new Product();
        $Add->name = $req->name;
        $Add->id_type = $req->Type;
        $Add->description = $req->description;
        $Add->unit_price = $req->unit_price;
        $Add->Promotion_price = $req->Promotion_price;
        $filename = $req->file('Image')->getClientOriginalName();
        $Add->image = $filename;
        $req->file('Image')->move('public/layout/image/product',$filename);
        $Add->save();
        return redirect()->route('ProductManager')->with('message','Thêm sản phẩm thành công');
    }
    public function getEditProduct($id){
        $OldProduct = Product::where('id',$id)->get();
        foreach ($OldProduct as $OPD) {
            $ProductType = ProductType::where('id',$OPD->id_type)->get();
            $TypeDif = ProductType::where('id','<>',$OPD->id_type)->get();
        }
        return view('admin.Edit-Product',compact('OldProduct','ProductType','TypeDif'));
    }
    public function postEditProduct(EditRequest $req , $id){
        $EditProduct = Product::find($id);
        $EditProduct->name = $req->name;
        $EditProduct->id_type = $req->Type;
        $EditProduct->description = $req->description;
        $EditProduct->unit_price = $req->unit_price;
        $EditProduct->promotion_price = $req->Promotion_price;
        $NewIMG = $req->file('Image');
        if($NewIMG){
            $filename = $req->file('Image')->getClientOriginalName();
            $EditProduct->image = $filename;
            $req->file('Image')->move('public/layout/image/product',$filename);
        }
        else{
            $EditProduct->image = $EditProduct->image;
        }
        $EditProduct->save();
        return redirect()->route('ProductManager')->with('message','Edit Product Thành Công');
    }
    public function getBillManager(){
        $Bill = DB::table('bills')
                    ->join('customer','bills.id_customer','=','customer.id')
                    ->select('bills.*','customer.name','customer.address','customer.phone_number')
                    ->get();
        return view('admin.BillManager',compact('Bill'));
    }
    public function getBillProduct($id){
        $BillProduct = DB::table('bill_detail')
                        ->join('products','bill_detail.id_product','=','products.id')
                        ->where('id_bill',$id)
                        ->select('bill_detail.*','products.name','products.unit_price','products.promotion_price',)
                        ->get();
        $total = Bill::where('id1',$id)
                    ->join('customer','bills.id_customer','=','customer.id')
                    ->select('bills.*','customer.name')    
                    ->get();
        return view('admin.Bill-Product',compact('BillProduct','total'));
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
