<?php

namespace App\Http\Controllers;

use App\Models\productAtt;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tax;


class ProductAttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('attributes')->whereHas('attributes')->get();
        $product_attributes = productAtt::orderBy('created_at','DESC')->get();
        return view('admin.product_attributes.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        $sizes = Size::all();
        $products = Product::all();
        return view('admin.product_attributes.create',compact(['products','colors','sizes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // product attribute
        // dd($request->all());
        if(isset($request->image_attribute)){
            if($request->hasFile('image_attribute')){
                $image = $request->image_attribute;
                $imageNewName = Time().".".$image->getClientOriginalExtension();
                $image->move('storage/attribute/',$imageNewName);
                $files = 'storage/attribute/'.$imageNewName;
            } 
            $data[] = array(
                'sku'=>mt_rand( 1000000000, 9999999999 ),
                'mrp'=> $request->mrp,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'size_id'=>$request->size_id ,
                'color_id'=>$request->color_id,
                'product_id' => $request->product,
                'image_attribute'=>$files,
                'created_at' =>Carbon::now(),
            );
        }else{
            $data[] = array(
                'sku'=>mt_rand( 1000000000, 9999999999 ),
                'mrp'=> $request->mrp,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'size_id'=>$request->size_id ,
                'color_id'=>$request->color_id,
                'product_id' => $request->product,
                
            );
        }
       
        productAtt::insert($data);
        Session::flash('success','product Attribute has been add successfully!');
        return redirect()->route('product_attribute.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productAtt  $productAtt
     * @return \Illuminate\Http\Response
     */
    public function show(productAtt $productAtt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productAtt  $productAtt
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        // dd($request->all());
        $productAtt = ProductAtt::where('id',$id)->first(); 
        $products = Product::where('status','1')->get();
        $colors = Color::where('status','1')->get();
        $sizes = Size::where('status','1')->get();
        return view('admin.product_attributes.edit',compact('productAtt','products','colors','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productAtt  $productAtt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());     
        $product_attribute = ProductAtt::find($request->id);

        if((isset($request->image_attribute))){ 
            
            if($request->hasFile('image_attribute')){
                $image = $request->image_attribute;
                $imageNewName = Time().".".$image->getClientOriginalExtension();
                $image->move('storage/attribute/',$imageNewName);
                $files = 'storage/attribute/'.$imageNewName;
            } 
            $product_attribute->sku = mt_rand( 1000000000, 9999999999 );
            $product_attribute->mrp =  $request->mrp;
            $product_attribute->price = $request->price;
            $product_attribute->quantity = $request->quantity;
            $product_attribute->size_id = $request->size_id ;
            $product_attribute->color_id = $request->color_id;
            $product_attribute->product_id  = $request->product;
            $product_attribute->image_attribute = $files;
            $product_attribute->updated_at =Carbon::now();

        }else{
            $product_attribute->sku = mt_rand( 1000000000, 9999999999 );
            $product_attribute->mrp =  $request->mrp;
            $product_attribute->price = $request->price;
            $product_attribute->quantity = $request->quantity;
            $product_attribute->size_id = $request->size_id;
            $product_attribute->color_id = $request->color_id;
            $product_attribute->product_id  = $request->product;
            $product_attribute->updated_at =Carbon::now();
        }

        $product_attribute->save();
        Session::flash('success','Product Attribute has been update successfully!');
        return redirect()->route('attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productAtt  $productAtt
     * @return \Illuminate\Http\Response
     */
    public function delete($productAtt)
    {
        if($productAtt){
            $productAtt = ProductAtt::find($productAtt)->delete();
            Session::flash('success','Product Attribute has been delete successfully!');
            return redirect()->route('attribute.index');
        }
    }
 
    public function status(Request $request, $id , $status)
    {
        $productAtt = ProductAtt::find($id);
        $productAtt->status = $status;
        $productAtt->save();
        Session::flash('success','Product Attribute status changed!');
        return redirect()->route('attribute.index');
    }

}
