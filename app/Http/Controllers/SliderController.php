<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideStore;
use App\Http\Requests\SlideUpdate;
use App\Models\Slider;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use UploadFileTrait;
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        return view('admin.slider.index', [
            'sliders' => Slider::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SlideStore $request)
    {
        $dataImage = $this->uploadFileTrait($request, 'image_path', 'slider');
        Slider::create(array_merge($request->all(), [
            'image_name' => $dataImage['file_name'],
            'image_path' => $dataImage['file_path'],
        ]));
        return redirect()->route('slider_index')->with('success', 'Create Slider successfully!');
    }


    public function edit($id)
    {
        return view('admin.slider.edit', [
            'slider' => Slider::findOrFail($id),
        ]);
    }

    public function update(SlideUpdate $request, $id)
    {
        $slider = Slider::findOrFail($id);
        //remove image feature from folder
        $sliderImage = str_replace('/storage', '/public', $slider->image_path);
        Storage::delete($sliderImage);
        $dataImage = $this->uploadFileTrait($request, 'image_path', 'slider');
        $slider->update(array_merge($request->all(), [
            'image_name' => $dataImage['file_name'],
            'image_path' => $dataImage['file_path'],
        ]));
        return redirect()->route('slider_index')->with('success', 'Updated Slider successfully!');
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $sliderImage = str_replace('/storage', '/public', $slider->image_path);
        Storage::delete($sliderImage);

        $slider->delete();
        return redirect()->route('slider_index')->with('success', 'Deleted Slider successfully!');
    }
}
