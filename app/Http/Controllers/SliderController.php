<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::simplePaginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'slide_text' => 'required',
            'slide_img' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        $sliderImage = null;
        if ($request->slide_img) {
            $sliderImage = "post_images/" .time().'.'.$request->slide_img->extension();
            $request->slide_img->move(public_path('post_images'), $sliderImage);
        }
        Slider::create([
            'label_name' => $request->label_name,
            'slide_text' => $request->slide_text,
            'slide_img' => $sliderImage,
            'slide_status' => $request->slide_status
        ]);
        return redirect()->route('admin.slider.index')->with('success', 'Slider Add Success fully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'slide_text' => 'required',
        ]);
        $sliderImageUrl = $slider->slide_img;
        if($request->slide_img){
            unlink($slider->slide_img);
            $imageName = time().'.'.$request->slide_img->extension();
            $request->slide_img->move(public_path('post_images'), $imageName);
            $sliderImageUrl = "post_images/" . $imageName;
        }
        $status = $request->slide_status;
        if(!$status == 'draft' || !$status == 'published'){
            echo $status;
        }
        $slider->update([
            'label_name' => $request->label_name,
            'slide_text' => $request->slide_text,
            'slide_img' => $sliderImageUrl,
            'slide_status' => $status
            // 'slide_status' => ($request->slide_status == 'draft') ? a : b ;,
        ]);
        return redirect()->route('admin.slider.index')->with('success', 'Slider Update Success fully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Slider $slider)
    {
        // $images = $slider->slide_img;

        unlink($slider->slide_img);
        $slider->delete();
        return redirect()->back()->with('success', 'Product Delete Success fully');

    }
}
