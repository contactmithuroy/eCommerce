<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct(Request $request){

    }
    
    public function login()
    {
        return view('admin.login');
    }

    // public function updatePassword(){
    //     $pass = Admin::find(1);
    //     $pass->password = Hash::make('aaaaaaaa');
    //     $pass->save();
    // }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        
        // $result = Admin::where(['email'=>$email, 'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'), $result->password )){
                
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                Session::flash('success','Login successfully');
                return redirect('admin/dashboard');

            }else{
                Session::flash('error', 'Please enter valid Password');
                return redirect('/login');
            }
        }else{
            Session::flash('error', 'Please enter valid login details');
            return redirect('/login');
        }

        // if(isset($result[0]->id)){
        //     $request->session()->put('ADMIN_LOGIN',true);
        //     $request->session()->put('ADMIN_ID',$result[0]->id);

        //     Session::flash('success','Login successfully');
        //     return redirect('admin/dashboard');

        // }else{
        //     Session::flash('error', 'Please enter valid login details');
        //     return redirect('/login');
        // }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout() {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        Session::flash('success','Logout successfully');
        return redirect('/login');
      }

}
    