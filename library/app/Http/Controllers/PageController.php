<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\manyrequest;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;


class PageController extends Controller
{
    public function getindex()
    {
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(4);
    	$sale_product = Product::where('promotion_price','<>',0)->paginate(4);
        return view('Page.trangchu' , compact('slide','new_product','sale_product'));
    }
    public function getproduct($id){
    	$product_type = Product::where('id_type',$id)->paginate(6);
    	$loai = ProductType::where('id',$id)->get();
    	$list_type = ProductType::all();
    	$other_product = Product::where('id_type','<>',$id)->paginate(3);
    	return view('Page.product_type', compact('product_type','loai','list_type','other_product'));
    }
    public function getProductDetail($id){
        	$detail = Product::where('id',$id)->first();
        	$same_product = Product::where('id_type', $detail->id_type)->paginate(3);
            $category = ProductType::all();		
    		return view('Page.product_detail',compact('detail','same_product','category'));
    }
    public function getAddCart(Request $req ,  $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart ->add($product , $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();

    }
     public function postAddMany(manyrequest $req){
        $Qty = $req->input('quantity');
        $id = $req->input('product_id');
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart ->addmany($product ,$id, $Qty);
        $req->session()->put('cart',$cart);
        return redirect()->back();

     }
    public function getDelete($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
     }

    public function getAbout(){
        return view('Page.about');
    }
    public function getContact(){
        return view('Page.contacts');
    }
     public function getSearch(Request $req){
        $key = $req->key;
        $list_type = ProductType::all();
        $ProductSearch = Product::where('name','like','%'.$key.'%')
                                ->orwhere('unit_price',$key)
                                ->paginate(6);
        return view('Page.Search',compact('ProductSearch','key','list_type'));
    }
    public function getAllProduct(){
        $list_type = ProductType::all();
        $all_product = Product::all();
        return view('Page.product',compact('list_type','all_product'));
    }
}
