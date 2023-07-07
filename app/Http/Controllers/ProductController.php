<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //view list page
    public function list(){
        $products = Product::orderBy('created_at','desc')->paginate(3);
        return view('admin.product.list',compact('products'));
    }
    //product create page
    public function createPage(){
        return view('admin.product.create');
    }
    //product creation
    public function create(Request $request){
        $this->checkDataValidation($request);
        $data=$this->getRequestData($request);
        $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public',$fileName);
        $data['image']=$fileName;
        $request->file('productImage')->storeAs('public',$fileName);
        Product::create($data);
        return redirect()->route('product#list');
    }
    //get Form Data
    private function getRequestData($request){
        return [
            'name'=>$request->productName,
            'description'=>$request->productDescription,
            'price'=>$request->productPrice,
            'waitingTime'=>$request->waitingTime
        ];
    }
    //check validity of request data
    private function checkDataValidation($request){
        Validator::make($request->all(),[
            'productName' => 'required|unique:products,name,'.$request->id,
            'productDescription'=>'required|min:8',
            'productPrice'=>'required',
            'productImage'=>'required|image',
            'waitingTime'=>'required'
        ])->validate();
    }
}
