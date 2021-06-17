<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
    //   $request->validate([
    //     'name'=>'required',
    //     'image'=>'required',
    //     'brand'=>'required',
    //     'model'=>'required',
    //     'user'=>'required',
    //     'warranty'=>'required',
    //     'category'=>'required',
    //     ]);

    $product = new Product();
      
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->brand = $request->brand;
    $product->model = $request->model;
    $product->user = $request->user;
    $product->warranty = $request->warranty;
    $product->status = '1';
    $product->technical_specification = $request->technical_specification;
    $product->short_description = $request->short_description;
    $product->description = $request->description;
    $product->keywords = $request->keywords;
    $product->published_at = Carbon::now();

      $product->slug = Str::slug($request->name,'-');
        if(Product::whereSlug($product->slug)->exists() ){
            $product->slug = "{$product->slug}_" . rand(0,500);

        }
    if($request->has('image')){
        $image = $request->image;
        $imageNewName = Time().".".$image->getClientOriginalExtension();
        $image->move('storage/product/',$imageNewName);
        $product->image = 'storage/product/'.$imageNewName;

    }

    $product->save();
    Session::flash('success','Product has been add successfully!');
    return redirect()->route('product.create');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->user = $request->user;
        $product->warranty = $request->warranty;
        $product->technical_specification = $request->technical_specification;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->keywords = $request->keywords;

      $product->slug = Str::slug($request->name,'-');
        if(Product::whereSlug($product->slug)->exists() ){
            $product->slug = "{$product->slug}_" . rand(0,500);

        }
        if($request->hasFile('image')){
            $image = $request->image;
            $imageNewName = Time().".".$image->getClientOriginalExtension();
            $image->move('storage/product/',$imageNewName);
            $product->image = 'storage/product/'.$imageNewName;

        }

        $product->save();
        Session::flash('success','Product has been update successfully!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($product)
    {
        if($product){
            $product = Product::find($product)->delete();
            Session::flash('success','product has been delete successfully!');
            return redirect()->route('product.index');
        }
    }
 
    public function status(Request $request, $id , $status)
    {
        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        Session::flash('success','product status changed!');
        return redirect()->route('product.index');
    }

}
