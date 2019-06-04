<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Requests\OrderRequest;
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

class OrderController extends Controller
{
    public function getCheckout(){
            return view('Page.dat_hang');
    }

    
    public function postOrder(OrderRequest $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email =$req->email;
        $customer->address =$req->address;
        $customer->phone_number =$req->phone;
        $customer->note = $req->notes;
        $customer->save();
        
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $billdetail = new BillDetail;
            $billdetail->id_bill = $bill->id;
            $billdetail->id_product = $key;
            $billdetail->quantity = $value['qty'];
            $billdetail->unit_price = $value['price']/$value['qty'];
            $billdetail->save();
            
        }
        
        Session::forget('cart');
        return redirect()->route('trangchu')->with('message', 'Đặt Hàng Thành Công');

     }
}
