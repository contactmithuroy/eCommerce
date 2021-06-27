<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Validator;
use Session;
class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::orderBy('created_at','DESC')->get();
        return view('admin.tax.index',compact('taxes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tax.create');
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
            'tax_description'=>'required|unique:taxes|max:55',
            'tax_value'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            $error = $validator->errors();
            return response()->json($error);

        }else{
            $validator = Validator::make($request->all(),$rules);
            $tax = new Tax();
            $tax->tax_description = ucfirst($request->tax_description);
            $tax->tax_value = $request->tax_value;
            $tax->status = 1;
            $tax->save();
            return response()->json($tax);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        return view('admin.tax.edit',compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'tax_description'=>"required|unique:taxes,id,$request->id|max:55",
            'tax_value'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
             Session::flash('error','Sorry your data has not updated');

        }else{
            $tax =Tax::find($request->id);
            $tax->tax_description = ucfirst($request->tax_description);
            $tax->tax_value = $request->tax_value;
            $tax->status = 1;
            $tax->save();
            return response()->json($tax);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function delete($tax)
    {
        if($tax){
            $tax = Tax::find($tax);
            if($tax){
                $tax->delete();
                Session::flash('success','Tax has been delete successfully!');
                return redirect()->route('tax.index');
            }else{
                Session::flash('error','Tax has not been deleted!');
                return redirect()->route('tax.index');
            }
        }else{
            Session::flash('error','Get some error!');
            return redirect()->route('tax.index');
        }
       
    }

    public function status(Request $request, $id , $status)
    {
        $tax = Tax::find($id);
        $tax->status = $status;
        $tax->save();
        Session::flash('success','Tax status changed!');
        return redirect()->route('tax.index');
    }
}
