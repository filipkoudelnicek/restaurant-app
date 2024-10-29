<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $test2 = Category::Where('name','test2')->first();
        return view('welcome', compact('test2'));
    }

}
