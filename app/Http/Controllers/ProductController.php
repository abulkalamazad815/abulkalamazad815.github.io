<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Subcategory;
use DB;
use App\ProductImage;

class ProductController extends Controller
{
    public function createProduct(){
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $subcategories = Subcategory::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct',['categories'=>$categories,'manufacturers'=>$manufacturers,'subcategories'=>$subcategories]);
    }
    public function storeProduct(Request $request){
        $this->validate($request,[
            'productName'=>'required',
            'productPrice'=>'required',
            'productImage'=>'required',
        ]);

        $productImage = $request->file('productImage');
        $name =  $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;
        $this->saveProductInfo($request,$imageUrl);
        return redirect('/product/add')->with('message','Product info save successfully');
    }
    protected function saveProductInfo($request,$imageUrl){
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->subcategoryId = $request->subcategoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage =$imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }
    public function manageProduct(){
       $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
            ->join('subcategories', 'products.subcategoryId', '=', 'subcategories.id')
            ->select('products.id', 'products.productName','products.productPrice','products.productQuantity','products.publicationStatus','categories.categoryName', 'categories.categoryDescription', 'manufacturers.manufacturerName','subcategories.subcategoryName')
            ->get();
       return view('admin.product.manageProduct',['products'=>$products]);
    }
    public function viewProduct($id){
        $productById = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
            ->join('subcategories', 'products.subcategoryId', '=', 'subcategories.id')
            ->select('products.*','categories.categoryName', 'categories.categoryDescription', 'manufacturers.manufacturerName','subcategories.subcategoryName')
            ->where('products.id',$id)
            ->first();
        return view('admin.product.viewProduct',['product'=>$productById]);
    }
    public function editProduct($id){
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $subcategories = Subcategory::where('publicationStatus', 1)->get();
        $productById = Product::where('id',$id)->first();
        return view('admin.product.editProduct',['productById'=>$productById,'categories'=>$categories,
            'manufacturers'=>$manufacturers,'subcategories'=>$subcategories]);
    }
     public function updateProduct(Request $request){
        //dd($request->all());
        $productById = Product::find($request->productId);
        $productImage = $request->file('productImage');
        if($productImage){
            unlink($productById->productImage);
            $name =  $request->productId.$productImage->getClientOriginalName();
            $uploadPath = 'public/productImage/';
            $productImage->move($uploadPath,$name);
            $imageUrl = $uploadPath.$name;
        }else{
            $imageUrl = $productById->productImage;
        }
        $productById->productName = $request->productName;
        $productById->categoryId = $request->categoryId;
        $productById->subcategoryId = $request->subcategoryId;
        $productById->manufacturerId = $request->manufacturerId;
        $productById->productPrice = $request->productPrice;
        $productById->productQuantity = $request->productQuantity;
        $productById->productShortDescription = $request->productShortDescription;
        $productById->productLongDescription = $request->productLongDescription;
        $productById->productImage =$imageUrl;
        $productById->publicationStatus = $request->publicationStatus;
        $productById->save();
        return redirect('/product/manage')->with('message','Product Info Update Successfully');
    }
    public function deleteProduct($id){
        $productById = Product::find($id);
        $productById->delete();
        return redirect('/product/manage')->with('message','Product Info Delete Successfully');
    }

    public function addProductImag($id){
      $productById = Product::where('id',$id)->first();
        return view('admin.product.addMoreImage',['productById'=>$productById]);
    }

    public function addProductMultiImag(Request $request){

        $this->validate($request,[
            'productMultImage'=>'required',
            'publicationStatus'=>'required',
            
        ]);

        $productImage = $request->file('productMultImage');
        $name =  $productImage->getClientOriginalName();
        $uploadPath = 'public/productMultImage/';
        $productImage->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;
        $this->saveProductsInfo($request,$imageUrl);
        return redirect('/product/manage')->with('message','Product image save successfully');
    }
    protected function saveProductsInfo($request,$imageUrl){
        $product = new ProductImage();
        $product->productMultImage =$imageUrl;
        $product->productId = $request->productId;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }
    
}
