<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category = new Category();
        $category->name = ucfirst($request->name);
        $category->slug = Str::slug($request->name,'-');

        if(Category::whereSlug($category->slug)->exists() ){
            $category->slug = "{$category->slug}_" . rand(0,500);
        }
        $category->save();
        // Session::flash('success','Category has been created successfully!');
        // return redirect()->back();
        return response()->json(TRUE);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        if($category = Category::find($request->id)){
            $category->name = ucfirst($request->name);
            $category->slug = Str::slug($request->name,'-');
    
            if(Category::whereSlug($category->slug)->exists() ){
                $category->slug = "{$category->slug}_" . rand(0,500);
            }
            $category->save();
            return response()->json(TRUE);
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();
            Session::flash('success','Category has been delete successfully!');
            return redirect()->route('category.index');
        }
    }

    public function status(Request $request, $id , $status)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        Session::flash('success','Category status changed!');
        return redirect()->route('category.index');
    }
}
