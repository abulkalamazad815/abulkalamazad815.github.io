<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subcategory;
use App\Category;

use DB;

class SubcategoryController extends Controller
{
    public function createSubcategory(){
        $categories = Category::all();
        return view('admin.subcategory.createSubcategory',['categories'=> $categories]);
    }
    
    public function storeSubcategory(Request $request){
         $this->validate($request,[
           'subcategoryName'=>'required',
           'subcategoryDescription'=>'required',
        ]);
         
         DB::table('subcategories')->insert([
            'subcategoryName'=>$request->subcategoryName,
            'categoryId'=>$request->categoryId,
            'subcategoryDescription'=>$request->subcategoryDescription,
            'publicationStatus'=>$request->publicationStatus,
        ]);
        return redirect('/subcategory/add')->with('message','Subcategory Info Save Successfully');
    }
     public function manageSubcategory(){
        // $subcategories = Subcategory::all();
        // return view('admin.subcategory.manageSubcategory',['subcategories'=> $subcategories]);
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.categoryId', '=', 'categories.id')
            ->select('subcategories.id', 'subcategories.subcategoryName','subcategories.publicationStatus','categories.categoryName','subcategories.subcategoryDescription','subcategories.created_at','subcategories.updated_at')
            ->get();
       return view('admin.subcategory.manageSubcategory',['subcategories'=>$subcategories]);
    }
    
     public function editSubcategory($id){
        $categories = Category::where('publicationStatus', 1)->get();
        $subcategoryById = Subcategory::where('id',$id)->first();
        return view('admin.subcategory.editSubcategory',['subcategoryById'=>$subcategoryById,'categories'=>$categories]);
    }
     public function updateSubcategory(Request $request){
        //dd($request->all());
        
         $subcategory = Subcategory::find($request->id);
         $subcategory->subcategoryName = $request->subcategoryName;
         $subcategory->categoryId = $request->categoryId;
         $subcategory->subcategoryDescription = $request->subcategoryDescription;
         $subcategory->publicationStatus = $request->publicationStatus;
         $subcategory->save();
         return redirect('/subcategory/manage')->with('message','Subcategory Info Update Successfully');
    }
    public function deleteSubcategory($id){
         $subcategory = Subcategory::find($id);
         $subcategory->delete();
         return redirect('/subcategory/manage')->with('message','Subcategory Info Delete Successfully');
    }
}
