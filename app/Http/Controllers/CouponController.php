<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
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
            'title'=>'required',
            'code' => 'required|unique:coupons',
            'value'=>'required',
        ]);

        $coupon = new Coupon();
        $coupon->title = ucfirst($request->title);
        $coupon->code = strtoupper($request->code);
        $coupon->value = ($request->value);
        $coupon->status = 1;
        $coupon->save();

        return response()->json(TRUE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit',compact('coupon'));
    }
    
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'title'=>'required',
            'code' => "required|unique:coupons,id,$request->id",
            'value'=>'required',
        ]);

        if($coupon = Coupon::find($request->id)){
            $coupon->title = ucfirst($request->title);
            $coupon->code = strtoupper($request->code);
            $coupon->value = $request->value;
            $coupon->save();
            return response()->json(TRUE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        if($coupon){
            $coupon->delete();
            Session::flash('success','Coupon has been delete successfully!');
            return redirect()->route('coupon.index');
        }
    }
 
    public function status(Request $request, $id , $status)
    {
        $coupon = Coupon::find($id);
        $coupon->status = $status;
        $coupon->save();
        Session::flash('success','Coupon status changed!');
        return redirect()->route('coupon.index');
    }

}
