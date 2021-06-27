<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use App\Models\Admin\Category;
use App\Models\Admin\Admin;
use App\Models\Admin\Size;
use App\Models\Admin\Color;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\Admin\Tax;
use App\Models\Admin\Product_attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $categories = Category::where('status','1')->get();
        $colors = Color::where('status','1')->get();
        $sizes = Size::where('status','1')->get();
        $brands = Brand::where('status','1')->get();
        $taxes = Tax::where('status','1')->get();
        return view('admin.product.create',compact(['categories','colors','sizes','brands','taxes']));
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
    // dd($request->all());
    $product = new Product();
      
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->brand = $request->brand;
    $product->model = $request->model;
    $product->user = session()->has('ADMIN_ID');
    $product->warranty = $request->warranty;
    $product->status = '1';
    $product->technical_specification = $request->technical_specification;
    $product->short_description = $request->short_description;
    $product->description = $request->description;
    $product->keywords = $request->keywords;
    $product->published_at = Carbon::now();
    $product->lead_time = $request->lead_time;
    $product->tax = $request->tax;
    // $product->tax_type = $request->tax_type;
    $product->is_promo = $request->is_promo;
    $product->is_featured = $request->is_featured;
    $product->is_discounted = $request->is_discounted;
    $product->is_trending = $request->is_trending;

      $product->slug = Str::slug($request->name,'-');
        if(Product::whereSlug($product->slug)->exists() ){
            $product->slug = "{$product->slug}_" . rand(0,500);

        }
    if($request->has('product_image')){
        $image = $request->product_image;
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
        $categories = Category::where('status','1')->get();
        $colors = Color::where('status','1')->get();
        $sizes = Size::where('status','1')->get();
        $brands = Brand::where('status','1')->get();
        $taxes = Tax::where('status','1')->get();
        return view('admin.product.edit',compact(['product','categories','colors','sizes','brands','taxes']));
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
        $request->validate([
                'image_attribute'=>'nullable',
                ]);
        // dd($request->all());
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->user = session()->has('ADMIN_ID');
        $product->warranty = $request->warranty;
        $product->technical_specification = $request->technical_specification;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->keywords = $request->keywords;

        $product->lead_time = $request->lead_time;
        $product->tax = $request->tax;
        // $product->tax_type = $request->tax_type;
        $product->is_promo = $request->is_promo;
        $product->is_featured = $request->is_featured;
        $product->is_discounted = $request->is_discounted;
        $product->is_trending = $request->is_trending;

        $product->slug = Str::slug($request->name,'-');
        if(Product::whereSlug($product->slug)->exists() ){
            $product->slug = "{$product->slug}_" . rand(0,500);

        }
        if($request->has('product_image')){
            $image = $request->product_image;
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
            $product = Product::find($product);
            if(file_exists(public_path($product->image))){ //if have this type of path has exiting
                unlink(public_path("{$product->image}")); // have exiting then delete this file
            }
            $product->delete();
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
