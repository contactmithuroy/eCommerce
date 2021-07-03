<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAtt;
use App\Models\Admin\Size;
use App\Models\Admin\Color;
use App\Models\Admin\Brand;
use App\Models\Admin\HomeBanner;
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

        $banners = HomeBanner::where('status',1)->take(5)->get();
        
        $categories = Category::where('home',1)->take(5)->get();
        $discounters = Product::where('is_discounted',1)->where('status',1)->take(8)->get();
        $features = Product::where('is_featured',1)->where('status',1)->take(8)->get();
        $trendies = Product::where('is_trending',1)->where('status',1)->take(8)->get();


        $brands = Brand::where('status',1)->where('home',1)->take(8)->get();

        // echo "<pre>";
        // echo($features);
        // die();
        return view('front.index',compact(['firstCategories','fourCategories','banners','categories','brands','discounters','features','trendies']));
    }

    public function product($slug){
        $product= Product::where('status',1)->where('slug',$slug)->first();
        $related = Product::orderBy('created_at','desc')
                            ->where('category_id',$product->category_id)
                            ->where('status',1)
                            ->where('id','!=',$product->id)
                            ->take(15)
                            ->get();
        return view('front.product-detail',compact(['product','related']));
    }




    public function prx($array){
        echo "<pre>";
        // echo($array);
        // echo $array->name;
        die();
    }
}
