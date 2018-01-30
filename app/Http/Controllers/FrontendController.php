<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

    	$products = Product::paginate(3);
    	return view('index')->with('products',$products);
    }
    public function singleProduct($id){

    	//$product = Product::find($id);
    	return view('single',['product'=> Product::find($id)]);
    }
    
}
