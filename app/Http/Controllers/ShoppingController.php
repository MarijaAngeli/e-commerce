<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_to_cart(){
  
    	$prd = Product::find(request()->prd_id);
    	$cartItem = Cart::add([
    		'id'=>$prd->id,
    		'name'=>$prd->name,
    		'price'=>$prd->price,
    		'qty'=>request()->qty
    	]);
    	Cart::associate($cartItem->rowId, 'App\Product');
        flash('Product added to cart.')->success();
    	return redirect()->route('cart');
    }
    public function cart(){
    	return view('cart');
    }
    public function deleteCart($id){
    	Cart::remove($id);
    	return redirect()->route('cart');
    }
    public function incr($id, $qty){
    	Cart::update($id, $qty + 1);
    	return redirect()->back();
    }
    public function decr($id, $qty){
    	Cart::update($id, $qty - 1);
    	return redirect()->back();
    }
    public function rapid_add($id){
    	$prd = Product::find($id);
    	$cartItem = Cart::add([
    		'id'=>$prd->id,
    		'name'=>$prd->name,
    		'price'=>$prd->price,
    		'qty'=> 1
    	]);
    	Cart::associate($cartItem->rowId, 'App\Product');
        flash('Product added to cart.');
    	return redirect()->route('cart');
    }
}
