<?php

namespace App\Http\Controllers;

use Session;
use Mail;
use Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::Content()->count() == 0)
        {
            Session::flash('info', 'Your cart is empty');
            return redirect()->back();
        }

        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey('sk_test_BQokikJOvBiI2HlWgH4olfQ2');

        $token = request()->stripeToken;

        $charge = Charge::create([

            'amount' => Cart::total() * 100,
            'currency' => 'usd', 
            'description' => 'Buy your Apps', 
            'source' => request() -> stripeToken

            ]);

        Session::flash('success', 'Purchase successful, wait for our email');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
