<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //view list page
    public function list(){
        $products = Product::select('products.*','categories.name as category_name')
        ->when(request('key'),function($query){
            $query->where('products.name','like','%key%');
        })->leftJoin('categories','products.id','categories.id')
        ->orderBy('products.created_at','desc')->paginate(3);
        $products->appends(request()->all());
        //dd($products);
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
        $categories = Category::get();
        dd($categories);
        Product::create($data);
        return redirect()->route('product#list',compact('categories'))->with(['createSuccess'=>'Product is created!']);
    }
    //delete product
    public function delete($id){
        Product::where('id',$id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess'=>"Product Deleted."]);
    }
    //edit product
    public function edit($id){
        $data=Product::where('id',$id)->first();
        return view('admin.product.edit',compact('data'));
    }
    //update product
    public function update(Request $request){
        $this->checkUpdateDataValidation($request);;
        $data = $this->getRequestData($request);
        if($request->hasFile('productImage')){
            $oldImageName = Product::where('id',$request->updateId)->first();
            $oldImageName = $oldImageName->image;
            Storage::delete('public/'.$oldImageName);
        }
        $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
       // dd($fileName);
        $request->file('productImage')->storeAs('public',$fileName);
        $data['image']= $fileName;

        $uid = $request->updateId;
        Product::where('id',$uid)->update($data);
        return redirect()->route('product#list');
    }
    //view details product
    public function view($id){
        $details = Product::where('id',$id)->first();
        return view('admin.product.viewProduct',compact('details'));
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

    //check validity of request data for create
    private function checkDataValidation($request){
        Validator::make($request->all(),[
            'productName' => 'required|unique:products,name,'.$request->id,
            'productDescription'=>'required|min:8',
            'productPrice'=>'required',
            'productImage'=>'required|image',
            'waitingTime'=>'required'
        ])->validate();
    }

    //check validity of request data for update
    private function checkUpdateDataValidation($request){
        Validator::make($request->all(),[
            'productName' => 'required|unique:products,name,'.$request->updateId,
            'productDescription'=>'required|min:8',
            'productPrice'=>'required',
            'productImage'=>'image',
            'waitingTime'=>'required'
        ])->validate();
    }
}
