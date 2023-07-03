<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    //
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPw'=>'required|min:8|max:12',
            'newPw'=>'required|min:8|max:12',
            'confirmPw'=>'required|min:8|max:12|same:newPw'
        ])->validate();
    }

}
