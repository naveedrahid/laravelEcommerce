<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Darryldecode\Cart\Cart;
use Session;
use Stripe;
use App\Models\Order;
use Auth;
use App\Models\Product;

class StripeController extends Controller
{

    public function stripePost(Request $request)
    {

        $user_id = Auth::user()->id;
        if($request->payment_method == 'cash_on_delivery'){
            $order = Order::create([
                "user_id" => $user_id,
                "payment_type" => $request->payment_method,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "customer_address" =>  $request->customer_address,
                "city_name" => $request->city_name,
                "country_name" => $request->country_name,
                "zip_code" => $request->zip_code,
                "email" => $request->email,
                "phone" => $request->phone
            ]);

            foreach (\Cart::getContent() as $productDetail) {
                $order->order_items()->create([
                    "product_id" => $productDetail->id,
                    "price" => $productDetail->price,
                    "quantity" => $productDetail->quantity
                ]);
            }
        }
        else{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
            ]);

            $order = Order::create([
                "user_id" => $user_id,
                "payment_type" => $request->payment_method,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "customer_address" =>  $request->customer_address,
                "city_name" => $request->city_name,
                "country_name" => $request->country_name,
                "zip_code" => $request->zip_code,
                "email" => $request->email,
                "phone" => $request->phone
            ]);
            foreach (\Cart::getContent() as $productDetail) {
                $order->order_items()->create([
                    "product_id" => $productDetail->id,
                    "price" => $productDetail->price,
                    "quantity" => $productDetail->quantity
                ]);
            }
        }
        \Cart::clear();
        Session::flash('success', 'Payment successful!');
        return redirect()->route('front');


    }
}
