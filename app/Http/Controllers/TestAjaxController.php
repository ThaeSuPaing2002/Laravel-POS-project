<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestAjaxController extends Controller
{
    public function show(){
        return view('TestingAjaxForAnotherProject.sorting');
    }
}
