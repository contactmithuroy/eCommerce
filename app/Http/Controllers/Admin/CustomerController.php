<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use Validator;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy("created_at","DESC")->get();
        return view('admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $customer = Customer::find($id);
        // dd($customer);
        if($customer){
            if(file_exists(public_path($customer->image))){ //if have this type of path has exiting
                unlink(public_path("{$customer->image}")); // have exiting then delete this file
            } 
            $customer->delete();
            Session::flash('success','Customer has been delete successfully!');
            return redirect()->route('customer.index');
        }
    }

    public function status(Request $request, $id , $status)
    {
        $customer = Customer::find($id);
        $customer->status = $status;
        $customer->save();
        Session::flash('success','Customer status changed!');
        return redirect()->route('customer.index');
    }
}
