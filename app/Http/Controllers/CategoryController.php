<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //show admin list page
    public function list(){
        $categories = Category::when(request('searchKey'),function($query){
            $query->where('name','like','%'.request('searchKey').'%');
        })->orderBy('id','desc')->paginate(5);
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
        return redirect()->route('category#list')->with(['createSuccess'=>"Creation Success!"]);;
    }
    //delete category
    public function delete($id){
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>"Deletion Success!"]);
    }
    //go to edit page category
    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }
    //update category
    public function update($id,Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::where('id',$id)->update($data);
        return redirect()->route('category#list')->with(['updateSuccess'=>"Update Success!"]);;
    }
    //validation check for new category
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|unique:categories,name,'.$request->id
        ],[])->validate();
    }
    //get categoy data
    private function requestCategoryData($request){
        return [
            'name'=>$request->categoryName
        ];
    }
}
