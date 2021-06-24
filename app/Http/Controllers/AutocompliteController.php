<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AutocompliteController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function create(Request $request){
            $data = Category::select('name')->where('name','like',"%$request->terms%")->take(10)->get();
            return response()->json($data);
    }
}

