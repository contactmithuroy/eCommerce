<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Session;

class HomeBannerController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = HomeBanner::where('status',1)->orderBy('created_at','DESC')->take(5)->get();
        return view('admin.home_banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required|unique:home_banners|max:55',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            $error = $validator->errors();
            return response()->json($error);

        }else{
            if($request->hasFile('image')){
                $image = $request->image;
                $imageNewName = Time().".".$image->getClientOriginalExtension();
                $image->move('storage/banner/',$imageNewName);
                $files = 'storage/banner/'.$imageNewName;
            } 
            $banner = new HomeBanner();
            $banner->image =$files;
            $banner->title = strtoupper($request->title);
            $banner->offer =strtoupper($request->offer);
            $banner->description = $request->description;
            $banner->title_link = Str::slug($request->title,'-');
            $banner->title_link = "{$banner->title_link}_" . rand(0,1000);
            $banner->status = 1;
            $banner->save();
        }
        return response()->json((($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function show(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = HomeBanner::find($id);
        return view('admin.home_banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title'=>"required|unique:home_banners,id,$request->id|max:55",
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            $error = $validator->errors();
            return response()->json($error);

        }else{
            echo $request->id;
            $banner = HomeBanner::find($request->id); 
           
            if($request->hasFile('image')){
                $image = $request->image;
                $imageNewName = Time().".".$image->getClientOriginalExtension();
                $image->move('storage/banner/',$imageNewName);
                $files = 'storage/banner/'.$imageNewName;
                $banner->image =$files;
            } 

            $banner->title = strtoupper($request->title);
            $banner->offer =strtoupper($request->offer);
            $banner->description = $request->description;
            $banner->title_link = Str::slug($request->title,'-');
            $banner->title_link = "{$banner->title_link}_" . rand(0,1000);
            $banner->status = 1;
            $banner->save();
        }
        // return response()->json((($request->all())));
        Session::flash('success','Banner has been update successfully!');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeBanner $homeBanner)
    {
        //
    }
}
