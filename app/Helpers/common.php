<?php

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Cart;

function getData(){
    return "<b>manus </b>";
}
function prx($array){
    echo "<pre>";
    echo $array;
    die();
}
function getTopNavCat(){
    $category = Category::where('status',1)->get();
    $arr = [];

    foreach ($category as $row) {
        $arr[$row->id]['name'] = $row->name;
        $arr[$row->id]['parent_category_id'] = $row->parent_category_id;
        $arr[$row->id]['slug'] = $row->slug;
    }

    $str = buildTreeView($arr,0);
    return $str;
}

$html = '';

function buildTreeView($arr, $parent, $level=0, $prelevel=-1){
    global $html;
    foreach ($arr as $id => $data) {
        if($parent == $data['parent_category_id']){
            if($level > $prelevel){
                if($html == ''){
                    $html .= '<ul class="nav navbar-nav">';
                }else{
                    $html .= '<ul class="dropdown-menu">';
                }
            }
            if($level == $prelevel){
                $html .= '</li>';
            }
    
            // $html .= '<li><a href="#">'.$data['name'].'<span class="caret"></span></a>';
            $html .= '<li><a href="'.url('category').'/'.$data['slug'].'">'.$data['name'].'<span class=""></span></a>';
            // $html .= '<li><a href="'.$data['slug'].'">'.$data['name'].'<span class=""></span></a>';
            if($level > $prelevel){
                $prelevel = $level;
            }
            $level++;
            buildTreeView($arr,$id,$level,$prelevel);
            $level --;
        }
    }
    if($level == $prelevel){
        $html .= '</li></ul>';
    }
    return $html;
}
// ===============================================================================
 function getUserTemId(){
// session()->forget('USER_TEMP_ID');
if(!empty(session()->has('USER_TEMP_ID'))){
    return session()->get('USER_TEMP_ID');
}

if(empty(session()->has('USER_TEMP_ID'))){
    $rand = rand(111111111,000000000);
    session()->put('USER_TEMP_ID', $rand);
    return $rand;
}

}
// ===============================================================================
function getAddToCartTotalItem(){
    if(session()->has('FRONT_USER_LOGIN')){
        $user_id = session()->has('FRONT_USER_LOGIN');
        $user_type = "Reg";
    }else {
        $user_id = getUserTemId();
        $user_type = "Not_Reg";
    }
    $user_id = is_array($user_id) ? $user_id[0] : $user_id;
    $cart_products = Cart::with('products','attributes')->where('user_id',$user_id)
                            ->where('user_type',$user_type)
                            ->orderBy('created_at','DESC')
                            ->take(5)
                            ->get();
    return $cart_products;
}