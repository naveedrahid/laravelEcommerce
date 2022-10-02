<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use  App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;

class CustomerAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::with('order_items')->get();
        return  view('admin.myaccount.customerAccount', compact('orders'));
    }
    public function edit(Request $request, $id)
    {
        $orders = Order::with('order_items')->where('id', $id)->get();
        return  view('admin.myaccount.update', compact('orders'));
    }
    public function customer_update(Request $request, Order $id)
    {
        $id->update([
            'order_status' => $request->order_status
        ]);

        return redirect()->route('admin.customers')->with('success', 'Order Update Success fully');
    }

}
