<?php

namespace App\Http\Controllers;
use Cart;
use Mail;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
       
    public function index(){
    	if (Cart::content()->count() == 0) {
    		flash('Your cart is still empty, do some shopping.');
    		return redirect()->back();
    	}
    	return view('checkout');
    }

    public function pay(){
    	
    	Stripe::setApiKey('sk_test_465CfuLrRf6BGpOmRFbRqPXs');
    	// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = request()->stripeToken;

		// Charge the user's card:
		$charge = Charge::create([
		  "amount" => Cart::total() * 100,
		  "currency" => "usd",
		  "description" => "Example charge",
		  "source" => $token,
		]);

		flash('Purchase was successfully. Please wait for our email .');
		Cart::destroy();
		Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
		return redirect('/');

    }
}
