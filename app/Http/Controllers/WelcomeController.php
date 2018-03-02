<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Slider1;
use App\Slider2;
use App\ProductImage;

class WelcomeController extends Controller
{
    public function index(){
        $publishedProducts = Product::where('publicationStatus',1)->get();
        $publishedSliders = Slider1::where('publicationStatus',1)->get();
        $publishedSliders2 = Slider2::where('publicationStatus',1)->get();
        return view('frontEnd.home.homeContent',['publishedProducts'=>$publishedProducts,'publishedSliders'=>$publishedSliders,'publishedSliders2'=>$publishedSliders2]);
    }

    // public function category($id){
    //      $publishedCategoryProducts = Product::where('categoryId',$id)
    //                                     ->where('publicationStatus',1)
    //                                     ->get();
    //     return view('frontEnd.category.allCategoryProduct',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    // }

    public function subcategory($id){
         $publishedSubCategoryProducts = Product::where('subcategoryId',$id)
                                        ->where('publicationStatus',1)
                                        ->get();
        return view('frontEnd.category.categoryContent',['publishedSubCategoryProducts'=>$publishedSubCategoryProducts]);
    }
    public function contact(){
        return view('frontEnd.contact.contactContent');
    }
    
     public function productDetails($id){
         $productById = Product::where('id',$id)->first();
         $productMultiImages = ProductImage::where('id',$id)->first();
                                   
        return view('frontEnd.product.productContent',['productById'=>$productById,'productMultiImages'=>$productMultiImages]);
    }
     
}