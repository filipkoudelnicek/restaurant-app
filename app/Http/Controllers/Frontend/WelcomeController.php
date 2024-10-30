<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $polevky = Category::Where('name', 'Polevky')->first();
        $hlavni_jidla = Category::Where('name', 'Hlavní jídla')->first();
        $dezerty = Category::Where('name', 'Dezerty')->first();

        return view('welcome', compact('polevky', 'hlavni_jidla', 'dezerty'));
    }

}
