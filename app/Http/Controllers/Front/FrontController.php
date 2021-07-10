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
use App\Models\Admin\Cart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




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
        // echo($categories);
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

    public function add_to_cart(Request $request){

        if($request->session()->has('FRONT_USER_LOGIN')){
            $user_id = $request->session()->has('FRONT_USER_LOGIN');
            $user_type = "Reg";
        }else {
            $user_id = getUserTemId();
            $user_type = "Not_Reg";
        }
        $user_id = is_array($user_id) ? $user_id[0] : $user_id;
        $quantity = $request->quantity;
        $product_id = $request->product_id;
        
        $product_attr = ProductAtt::where('product_id', $request->product_id)
                            ->whereHas('size', function($query) use($request){
                                    return $query->where('size', $request->size);
                            })
                            ->whereHas('color', function($query) use($request){
                                    return $query->where('color', $request->color);
                            })
                            ->first();
                          
        $productAtt_id = isset($product_attr->id) ? $product_attr->id : null;     
         //data check
         $check =  Cart::where('user_id',$user_id)
                        ->where('user_type',$user_type)
                        ->where('product_id',$product_id)
                        ->where('productAtt_id',$productAtt_id)
                        ->first();   
                                        
                if(!empty( $check)){
                    $update_id = $check->id;
                    if($quantity == 0 ){
                        $c = Cart::where('id',$update_id)->delete();
                        $massage = "Cart product has been deleted";
                    }else{
                        $update_cart = Cart::where('id',$update_id)->first();
                        $update_cart->quantity = $quantity;
                        $update_cart->save();
                        $massage = "Product has been updated";
                    }
                }else{
                    
                    $insert_cart = new Cart();                   
                    $insert_cart->user_id = $user_id;
                    $insert_cart->user_type = $user_type;
                    $insert_cart->product_id = $product_id;
                    $insert_cart->productAtt_id = $productAtt_id;
                    $insert_cart->quantity = $quantity;
                    $insert_cart->added_on = Carbon::now();                  
                    $insert_cart->save();
                    $massage = "Product has been inserted";
                   
                }
        return response()->json(['massage'=>$massage]);
        // return response()->json(['massage'=>$user_id,'r'=>$insert_cart]);
    }

    public function cart(Request $request){

        if($request->session()->has('FRONT_USER_LOGIN')){
            $user_id = $request->session()->has('FRONT_USER_LOGIN');
            $user_type = "Reg";
        }else {
            $user_id = getUserTemId();
            $user_type = "Not_Reg";
        }
        $user_id = is_array($user_id) ? $user_id[0] : $user_id;

        $cart_products = Cart::with('products','attributes')->where('user_id',$user_id)
                            ->where('user_type',$user_type)
                            ->orderBy('created_at','DESC')
                            ->get();

        // prx($cart_products);
        return view('front.cart',compact('cart_products'));
    }

    public function prx($array){
        echo "<pre>";
        echo($array);
        // echo $array->name;
        die();
    }
}
