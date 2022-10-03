<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Models\Category;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::simplePaginate(10);
        return view('admin.product.main')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('admin.product.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'product_qnty' => 'required'
        ]);

        $imageName = null;
        if ($request->product_image) {
            $imageName = "post_images/" .time().'.'.$request->product_image->extension();
            $request->product_image->move(public_path('post_images'), $imageName);
        }

        Product::create([
            'product_title'=> $request->product_title,
            'category_id'=> $request->category_id,
            'product_status'=> $request->product_status,
            'product_short_desc'=> $request->product_short_desc,
            'product_desc'=> $request->product_desc,
            'product_image'=> $imageName,
            'amount'=> $request->amount,
            'product_qnty'=> $request->product_qnty
        ]
    );
        return redirect()->back()->with('success', 'Product Add Success fully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home $Home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $Home)
    {
        //return view('admin.product.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home $Home
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $category = Category::all();
        return view('admin.product.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home $Home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_title' => 'required',
            'product_qnty' => 'required'
        ]);

        $imageUrl = $product->product_image;

        if($request->product_image){
            unlink($product->product_image);
            $imageName = time().'.'.$request->product_image->extension();
            $request->product_image->move(public_path('post_images'), $imageName);

            $imageUrl = "post_images/" . $imageName;
        }
        $status = $request->product_status;
        if(!$status == 'draft' || !$status == 'publish'){
            echo $status;
        }
        // navveeed
        $product->update([
            'product_title'=> $request->product_title,
            'category_id'=> $request->category_id,
            'product_short_desc'=> $request->product_short_desc,
            'product_desc'=> $request->product_desc,
            'product_image'=> $imageUrl,
            'product_qnty'=> $request->product_qnty,
            'amount'=> $request->amount,
            'product_status' => $status
        ]);

        return redirect()->back()->with('success', 'Product Edit Success fully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home $Home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        unlink($product->product_image);
        $product->delete();
        return redirect()->back()->with('success', 'Product Delete Success fully');
    }
}
