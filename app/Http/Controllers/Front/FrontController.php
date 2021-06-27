<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class FrontController extends Controller
{
    public function index(){

        $categories = Category::where('status',1)->where('home',1)->take(5)->get();
        $firstCategories = $categories->splice(0,1);
        $categories = $categories->splice(0);
        return view('front.index',compact(['firstCategories','categories']));
    }
}
