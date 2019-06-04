<?php
/**
 * Created by PhpStorm.
 * User: hieu
 * Date: 05/03/2019
 * Time: 5:44 CH
 */

namespace App;


class SessionHelper 
{
    $cart = Session::get('cart');
    public static function setQuantity($id , $qty)
    {
        return session([
            'cart.$id.qty'=>$qty;
        ]);
    }

    public static function setName($id, $name)
    {
        return session([
            'cart.item.name'=>$name;
        ]);
    }

    public static function getUnitPrice($id , $unit_price)
    {
        return session(
            'cart.item.unit_price' =>$unit_price;
        );
    }
    public static function setImage($id, $Image)
    {
        return session([
            'cart.item.image'=>$image;
        ]);
    }   
}