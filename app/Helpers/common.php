<?php

use App\Models\Admin\Category;
use App\Models\Admin\Product;

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
            $html .= '<li><a href="#">'.$data['name'].'<span class=""></span></a>';
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

 function getUserTemId(){
    if(session()->has('USER_TEMP_ID') === null){
        $rand = rand(111111111,000000000);
        session()->put('USER_TEMP_ID', $rand);
        return $rand; 
    }else {
        return session()->get('USER_TEMP_ID');
    }
}