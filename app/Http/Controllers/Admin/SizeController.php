<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Support\Facades\Str;
use App\Models\Admin\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
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
            'size'=>'required',
        ]);

        $size = new Size();
        $size->size = strtoupper($request->size);
        $size->status = 1;
        $size->save();

        return response()->json(TRUE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(size $size)
    {
        return view('admin.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'size' => "required",
        ]);

        if($size = Size::find($request->id)){
            $size->size = strtoupper($request->size);
            $size->save();
            return response()->json(TRUE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function delete($size)
    {
        if($size){
            $size = Size::find($size);
            $size->delete();
            Session::flash('success','Size has been delete successfully!');
            return redirect()->route('size.index');
        }
    }

    public function status(Request $request, $id , $status)
    {
        $size = Size::find($id);
        $size->status = $status;
        $size->save();
        Session::flash('success','size status changed!');
        return redirect()->route('size.index');
    }
}
