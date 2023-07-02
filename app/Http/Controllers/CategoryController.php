<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //show admin list page
    public function list(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.list',compact('categories'));
    }
    public function home(){
        return view('user.home');
    }
    //direct category create page
    public function createPage(){
        return view('admin.category.create');
    }
    //create new category
    public function create(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list');
    }
    //validation check for new category
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|unique:categories,name'
        ],[])->validate();
    }
    //get categoy data
    private function requestCategoryData($request){
        return [
            'name'=>$request->categoryName
        ];
    }
}
