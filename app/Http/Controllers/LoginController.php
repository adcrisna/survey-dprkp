<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function prosesLogin(Request $request){

    	if (Auth::attempt(['username'=>$request->username,'password'=>$request->password]))
        {
                return \Redirect()->to('/admin/home');
        }else{
            \Session::flash('msg_login','NIK Atau Password Salah!!');
            return \Redirect::back();
        }
    }
}
