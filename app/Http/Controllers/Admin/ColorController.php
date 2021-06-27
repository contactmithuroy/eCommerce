<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Admin\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
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
            'color' => 'required|unique:colors',
        ]);

        $color = new Color();
        $color->color = strtoupper($request->color);
        $color->status = 1;
        $color->save();

        return response()->json(TRUE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit',compact('color'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'color' => "required|unique:colors,id,$request->id",
        ]);

        if($color = Color::find($request->id)){
            $color->color = strtoupper($request->color);
            $color->save();
            return response()->json(TRUE);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function delete($color)
    {
        if($color){
            $color=Color::find($color)->delete();
            Session::flash('success','Color has been delete successfully!');
            return redirect()->route('color.index');
        }
    }
 
    public function status(Request $request, $id , $status)
    {
        $color = Color::find($id);
        $color->status = $status;
        $color->save();
        Session::flash('success','Color status changed!');
        return redirect()->route('color.index');
    }

}