<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
    public function checkout_view()
    {
           $items = \Cart::getContent();
           if(\Cart::isEmpty() == true){
            return redirect()->route('front')->with('error', 'Your Cart is Empty Please Select One Produt');
        }
           return view('frontPage.checkout', compact('items'));
    }
}
