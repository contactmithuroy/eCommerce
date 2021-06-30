<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAtt;
use App\Models\Admin\Size;
use App\Models\Admin\Color;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){

        $allCategories = Category::where('status',1)
                                    ->where('home',1)
                                    ->take(5)
                                    ->get();
        $firstCategories = $allCategories->splice(0,1);
        $fourCategories = $allCategories->splice(0);
        
        $categories = Category::where('home',1)->take(5)->get();

        return view('front.index',compact(['firstCategories','fourCategories','categories']));
    }
}
