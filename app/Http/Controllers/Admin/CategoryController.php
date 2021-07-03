<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Admin\Category;
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
        $categories = Category::where('parent_category_id','0')->get();
        return view('admin.category.index',compact(['categories']));
    }
    public function childCategory()
    {
        $categories = Category::all();
        $mainCategory = Category::all();
        return view('admin.category.child',compact(['categories','mainCategory']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required'
        ]);

        $category = new Category();
        $category->name = ucfirst($request->name);
        $category->slug = Str::slug($request->name,'-');
        $category->status = 1;

        $category->parent_category_id =$request->parent_category_id;  
        if(($request->home) !== null ){
            $category->home =1;  
        }else{
            $category->home =0; 
        }
        if(isset($request->image)){
            if($request->hasFile('image')){
                $image = $request->image;
                $imageNewName = Time().".".$image->getClientOriginalExtension();
                $image->move('storage/category/',$imageNewName);
                $files = 'storage/category/'.$imageNewName;
            } 
            $category->image = $files;
        }

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
        $categories = Category::where('status',1)->get();
        return view('admin.category.edit',compact(['category','categories']));
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
            $category->parent_category_id = $request->parent_category_id;
            $category->slug = Str::slug($request->name,'-');
            if(Category::whereSlug($category->slug)->exists() ){
                $category->slug = "{$category->slug}_" . rand(0,500);
            }

            if(($request->home) !== null ){
                $category->home =1;  
            }else{
                $category->home =0; 
            }
            
            if(isset($request->image)){
                if($request->hasFile('image')){
                    $image = $request->image;
                    $imageNewName = Time().".".$image->getClientOriginalExtension();
                    $image->move('storage/category/',$imageNewName);
                    $files = 'storage/category/'.$imageNewName;
                } 
                $category->image = $files;
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
        // return redirect()->route('category.index');
    }
}
