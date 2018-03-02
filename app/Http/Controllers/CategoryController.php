<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use DB;

class CategoryController extends Controller{
    public function createCategory(){
        return view('admin.category.createCategory');
    }
     public function storeCategory(Request $request){
        $this->validate($request,[
           'categoryName'=>'required',
           'categoryImage'=>'required',
           'categoryDescription'=>'required',
        ]);
        //return $request->all();
        
        //Eloquent ORM//
       // $category= new Category();
       // $category->categoryName = $request->categoryName;
       // $category->categoryDescription = $request->categoryDescription;
       // $category->publicationStatus = $request->publicationStatus;
       // $category->save();
       // return 'Category Info Save Successfully';
        
        
        //Eloquent ORM//
        //Category::create($request->all());
        //return 'Category Info Save Successfully';
        $categoryImage = $request->file('categoryImage');
        $name =  $categoryImage->getClientOriginalName();
        $uploadPath = 'public/categoryImage/';
        $categoryImage->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;
        
        //query builder//
        DB::table('categories')->insert([
            'categoryName'=>$request->categoryName,
            'categoryImage'=>$imageUrl,
            'categoryDescription'=>$request->categoryDescription,
            'publicationStatus'=>$request->publicationStatus,
        ]);
        return redirect('/category/add')->with('message','Category Info Save Successfully');
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manageCategory',['categories'=> $categories]);
    }
     public function editCategory($id){
        $categoryById = Category::where('id',$id)->first();
        return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }
     public function updateCategory(Request $request){
        //dd($request->all());
        
         $category = Category::find($request->id);
        $categoryImage = $request->file('categoryImage');
        if($categoryImage){
            unlink($category->categoryImage);
            $name =  $request->id.$categoryImage->getClientOriginalName();
            $uploadPath = 'public/categoryImage/';
            $categoryImage->move($uploadPath,$name);
            $imageUrl = $uploadPath.$name;
        }else{
            $imageUrl = $category->categoryImage;
        }
         $category->categoryName = $request->categoryName;
         $category->categoryImage = $imageUrl;
         $category->categoryDescription = $request->categoryDescription;
         $category->publicationStatus = $request->publicationStatus;
         $category->save();
         return redirect('/category/manage')->with('message','Category Info Update Successfully');
    }
    public function deleteCategory($id){
         $category = Category::find($id);
         $category->delete();
         return redirect('/category/manage')->with('message','Category Info Delete Successfully');
    }
}
