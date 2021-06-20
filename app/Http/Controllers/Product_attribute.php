<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_attribute;



class Product_attr extends Controller
{
    public function index()
    {
        $product_attributes = Product_attribute::orderBy('created_at','DESC')->get();
        return view('admin.product_attributes.index',compact('product_attributes'));
    }
}
