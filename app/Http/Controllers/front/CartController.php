<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

use App\Models\Product;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Cart::getContent();



        return view('frontPage.cart', compact('items'));
    }
    public function add_to_cart(Request $request,Product $product)
    {
         //dd($request->all());
        // Product::find($id)->get();


        \Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->product_title,
            'price' => $product->amount,
            'quantity' => $request->qty,
            'attributes' => array()
        ));

        return redirect()->route('cart');


    }


    public function updateQuantity(Request $request)
    {
    \Cart::update($request->id, array(
    'quantity' => array(
    'relative' => false,
    'value' => $request->qty,
    'image' => $request->product_image
    // 'attributes' => array('product_image')
    ),
    ));
    return response()->json(['success'=>true]);
    }

    public function update_product(Request $request)
    {
        if($request->id && $request->quantity){


            \Cart::update($request->id, array(
                    'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));

            return response()->json(['success'=>true]);


        }
    }



    public function remove_product(Product $product)
    {
        \Cart::remove($product->id);
        return redirect()->back();
    }

}
