<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    //go to password change page
    public function changePwPage(){
        return view('admin.account.changePW');
    }
    //update password
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id',Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if(Hash::check($request->oldPw,$dbHashValue)){
            $data= [
                'password'=>Hash::make($request->newPw)
            ];
            User::where('id',Auth::user()->id)->update($data);
        Auth::logout();
        return redirect()->route('auth#loginPage');
        }
        return back()->with(['notMatch'=>'The old Password does not match. Try Again']);
    }

    //go to account details page
    public function detailsPage(){
        return view('admin.account.details');
    }

    //go to edit page of account profile
    public function edit(){
        return view('admin.account.edit');
    }

    //update user info
    public function update($id,Request $request){
        $this->infoValidationCheck($request);
        $data = $this->getUserData($request);
        if($request->hasFile('image')){
           $dbImage = User::where('id',$id)->first();
           $dbImage = $dbImage->image;
           if($dbImage != null){
            Storage::delete('public/'.$dbImage);
           }
           $fileName = uniqid().$request->file('image')->getClientOriginalName();
           $request->file('image')->storeAs('public',$fileName);
           $data['image']=$fileName;
        }
        User::where('id',$id)->update($data);
        return redirect()->route('admin#detailsPage');
    }
    //
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPw'=>'required|min:8|max:12',
            'newPw'=>'required|min:8|max:12',
            'confirmPw'=>'required|min:8|max:12|same:newPw'
        ])->validate();
    }
    //get User Data for update
    private function getUserData($request){
        return[
            'name'=>$request->uname,
            'email'=>$request->uemail,
            'phone'=>$request->uphone,
            'address'=>$request->uaddress,
            'updated_at'=>Carbon::now()
        ];
    }

    //validate data for update user info
    private function infoValidationCheck($request){
        Validator::make($request->all(),[
            'uname'=>'required',
            'uemail'=>'required',
            'uphone'=>'required',
            'uaddress'=>'required',
        ])->validate();
    }

}
