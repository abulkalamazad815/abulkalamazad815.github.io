<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Manufacturer;

use DB;

class ManufacturerController extends Controller
{
     public function createManufacturer(){
        return view('admin.manufacturer.createManufacturer');
    }
     public function storeManufacturer(Request $request){
        $this->validate($request,[
           'manufacturerName'=>'required',
           'manufacturerDescription'=>'required',
        ]);
        //return $request->all();
        
        //Eloquent ORM//
        $manufacture= new Manufacturer();
        $manufacture->manufacturerName = $request->manufacturerName;
        $manufacture->manufacturerDescription = $request->manufacturerDescription;
        $manufacture->publicationStatus = $request->publicationStatus;
        $manufacture->save();
       // return 'Category Info Save Successfully';
        
        
        //Eloquent ORM//
        //Category::create($request->all());
        //return 'Category Info Save Successfully';
        
        
        //query builder//
       /* DB::table('manufacturers')->insert([
            'manufacturerName'=>$request->manufacturerName,
            'manufacturerDescription'=>$request->manufacturerDescription,
            'publicationStatus'=>$request->publicationStatus,
        ]);*/
        return redirect('/manufacturer/add')->with('message','Manufacturer Info Save Successfully');
    }
    public function manageManufacturer(){
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.manageManufacturer',['manufacturers'=> $manufacturers]);
    }
     public function editManufacturer($id){
        $manufacturerById = Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
    }
    public function updateManufacturer(Request $request){
        //dd($request->all());

         $manufacture = Manufacturer::find($request->id);
         $manufacture->manufacturerName = $request->manufacturerName;
         $manufacture->manufacturerDescription = $request->manufacturerDescription;
         $manufacture->publicationStatus = $request->publicationStatus;
         $manufacture->save();
         return redirect('/manufacturer/manage')->with('message','Manufacturer Info Update Successfully');
    }
    public function deleteManufacturer($id){
         $manufacture = Manufacturer::find($id);
         $manufacture->delete();
         return redirect('/manufacturer/manage')->with('message','Manufacturer Info Delete Successfully');
    }
}
