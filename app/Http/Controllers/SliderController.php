<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider1;
use App\Slider2;
class SliderController extends Controller
{   //SHOW SLIDER1//
     public function createSlider1(){
        return view('admin.slider.createSlider1');
    }
     
    //STORE SLIDER1//
    public function storeSlider1(Request $request){
        $this->validate($request,[
            'slider1Image'=>'required',
            'sliderDescription'=>'required',
            'publicationStatus'=>'required',
        ]);

        $slider1Image = $request->file('slider1Image');
        $name =  $slider1Image->getClientOriginalName();
        $uploadPath = 'public/sliderImage/';
        $slider1Image->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;
        $this->saveSliderInfo($request,$imageUrl);
        return redirect('/slider/add')->with('message','Slider1 info save successfully');
    }
    protected function saveSliderInfo($request,$imageUrl){
        $slider = new Slider1();
        $slider->slider1Image =$imageUrl;
        $slider->sliderDescription = $request->sliderDescription;
        $slider->publicationStatus = $request->publicationStatus;
        $slider->save();
    }

    //MANAGE SLIDER1//
    public function manageSlider1(){
        $sliderPrimaris = Slider1::all();
        return view('admin.slider.manageSliderPrimary',['sliderPrimaris'=> $sliderPrimaris]);
    }

     //EDIT SLIDER1//
    public function editSlider1($id){
         $sliderById = Slider1::where('id',$id)->first();
        return view('admin.slider.editSlider1',['sliderById'=>$sliderById]);
    }

     //UPDATE SLIDER1//
    public function updateSlider1(Request $request){
         $slider1 = Slider1::find($request->id);
        $slider1Image = $request->file('slider1Image');
        if($slider1Image){
            unlink($slider1->slider1Image);
            $name =  $request->id.$slider1Image->getClientOriginalName();
            $uploadPath = 'public/sliderImage/';
            $slider1Image->move($uploadPath,$name);
            $imageUrl = $uploadPath.$name;
        }else{
            $imageUrl = $slider1->slider1Image;
        }
         $slider1->slider1Image = $imageUrl;
         $slider1->sliderDescription = $request->sliderDescription;
         $slider1->publicationStatus = $request->publicationStatus;
         $slider1->save();
         return redirect('/slider/manage')->with('message','Slider1 Info Update Successfully');
    }

    //DELETE SLIDER1//
    public function deleteSlider1($id){
        $category = Slider1::find($id);
        $category->delete();
        return redirect('/slider/manage')->with('message','Slider1 Delete Successfully');
    }

    //SHOW SLIDER2//
    public function createSlider2(){
        return view('admin.slider.createSlider2');
    }
    //STORE SLIDER2//
     public function storeSlider2(Request $request){
        $this->validate($request,[
            'slider2Image'=>'required',
            'sliderDescription'=>'required',
            'publicationStatus'=>'required',
        ]);

        $slider1Image = $request->file('slider2Image');
        $name =  $slider1Image->getClientOriginalName();
        $uploadPath = 'public/sliderSmallImage/';
        $slider1Image->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;
        $this->saveSliderInfo2($request,$imageUrl);
        return redirect('/slider2/add')->with('message','Slider2 info save successfully');
    }
    protected function saveSliderInfo2($request,$imageUrl){
        $slider = new Slider2();
        $slider->slider2Image =$imageUrl;
        $slider->sliderDescription = $request->sliderDescription;
        $slider->publicationStatus = $request->publicationStatus;
        $slider->save();
    }

     
     //MANAGE SLIDER2//
    public function manageSlider2(){
        $sliderSecondarys = Slider2::all();
        return view('admin.slider.manageSliderSecondary',['sliderSecondarys'=> $sliderSecondarys]);
    }
     //EDIT SLIDER2//
    public function editSlider2($id){
         $sliderById = Slider2::where('id',$id)->first();
        return view('admin.slider.editSlider2',['sliderById'=>$sliderById]);
    }

    //UPDATE SLIDER2//
    public function updateSlider2(Request $request){
         $slider2 = Slider2::find($request->id);
        $slider2Image = $request->file('slider2Image');
        if($slider2Image){
            unlink($slider2->slider2Image);
            $name =  $request->id.$slider2Image->getClientOriginalName();
            $uploadPath = 'public/sliderSmallImage/';
            $slider2Image->move($uploadPath,$name);
            $imageUrl = $uploadPath.$name;
        }else{
            $imageUrl = $slider2->slider2Image;
        }
         $slider2->slider2Image = $imageUrl;
         $slider2->sliderDescription = $request->sliderDescription;
         $slider2->publicationStatus = $request->publicationStatus;
         $slider2->save();
         return redirect('/slider2/manage')->with('message','Slider2 Info Update Successfully');
    }

    //DELETE SLIDER2//
    public function deleteSlider2($id){
        $category = Slider2::find($id);
        $category->delete();
        return redirect('/slider2/manage')->with('message','Slider2 Delete Successfully');
    }
}
