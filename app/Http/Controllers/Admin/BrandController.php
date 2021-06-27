<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Session;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand' => 'required|unique:brands',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $brand = new brand();
        if(isset($request->image)){
            $image = $request->image;
            $imageNewName = Time().".".$image->getClientOriginalExtension();
            $image->move('storage/brand/',$imageNewName);
            $files = 'storage/brand/'.$imageNewName;

            $brand->brand = $request->brand;
            $brand->image = $files;

            if(($request->home) !== null ){
                $brand->home =1;  
            }else{
                $brand->home =0; 
            }
            
        }else{
            $brand->brand = $request->brand;
            if(($request->home) !== null ){
                $brand->home =1;  
            }else{
                $brand->home =0; 
            }
        }
        $brand->save();
        Session::flash('success','Brand name has been add successfully!');
        return redirect()->route('brand.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'brand' => "required|unique:brands,id,$request->id",
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $brand = brand::find($request->id);
        if(isset($request->image)){
            $image = $request->image;
            $imageNewName = Time().".".$image->getClientOriginalExtension();
            $image->move('storage/brand/',$imageNewName);
            $files = 'storage/brand/'.$imageNewName;

            $brand->brand = $request->brand;
            $brand->image = $files;

            if(($request->home) !== null ){
                $brand->home =1;  
            }else{
                $brand->home =0; 
            }
            
        }else{
            $brand->brand = $request->brand;
            if(($request->home) !== null ){
                $brand->home = 1;  
            }else{
                $brand->home = 0; 
            }
        }
        $brand->save();
        Session::flash('success','Brand name  has been update successfully!');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Brand $brand)
    // {
    //     return "hi";
    // }

    public function destroy($id)
    {
        if($id){
            $brand = Brand::find($id);
            if(file_exists(public_path($brand->image))){ //if have this type of path has exiting
                unlink(public_path("{$brand->image}")); // have exiting then delete this file
            }
            $brand->delete();
            Session::flash('success','Brand has been delete successfully!');
            return redirect()->route('brand.index');
        }
    }
 
    public function status(Request $request, $id , $status)
    {
        $brand = Brand::find($request->id);
        $brand->status = $request->status;;
        $brand->save();
        Session::flash('success','brand status changed!');
        return redirect()->route('brand.index');
    }

}
