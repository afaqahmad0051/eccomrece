<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView()
    { 
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function SliderAdd(){
        return view('backend.slider.slider_add');
    }

    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_image' => 'required',
        ], [
            'slider_image.required' => 'Slider Image is required',
        ]);
        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title_ur' => $request->title_ur,
            'title_en' => $request->title_en,
            'desc_ur' => $request->desc_ur,
            'desc_en' => $request->desc_en,
            'slider_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Slider Inserted',
            'alert-type' => 'success'
        );
        return redirect()->route('all.slider')->with($notification);
    }

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));
    }

    public function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->old_image;
        if ($request->file('slider_image')) {
            unlink($old_image);
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title_ur' => $request->title_ur,
                'title_en' => $request->title_en,
                'desc_ur' => $request->desc_ur,
                'desc_en' => $request->desc_en,
                'slider_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Slider Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title_ur' => $request->title_ur,
                'title_en' => $request->title_en,
                'desc_ur' => $request->desc_ur,
                'desc_en' => $request->desc_en,
            ]);
            $notification = array(
                'message' => 'Slider Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.slider')->with($notification);
        }
    }

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        // dd($slider);
        $notification = array(
            'message' => 'Slider Deactivated',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
