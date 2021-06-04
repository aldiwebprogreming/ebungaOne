<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
// use App\LoginUser;

class AuthUserController extends Controller
{
    function index(){
    	return view('login_user');
    }


    function cek_login(Request $request){

    	$request->validate([

			'email' => 'required',
	        'password' => 'required',
	        // 'hp' => 'required|max:13|min:11',
	        // 'alamat' => 'required',
	        // 'bio' => 'required',
		]);

    	$email = $request->email;
    	$pass = $request->password;
    	$user = DB::table('login_users')->where('email', $email)->first();
    	if ($user == true) {
    		if (password_verify($pass, $user->password)) {
    			session([
    				'name' => $user->name,
    				'email' => $user->email,
    			]);
    			return redirect('/');
    		}else {
    			return redirect('ebunga/login')->with('toast_error', 'Password wrong');
    		}
    	} else {
    		return redirect('ebunga/login')->with('toast_error', 'account wrong');
    	}
    }


    function register(){

     return view('register_user');
    }

    function creat(Request $request){

    	$insert = DB::table('login_users')->insert([
    		'name' => $request->full_name,
   			 'email' => $request->email,
   			 'password' => password_hash($request->password1, PASSWORD_DEFAULT),
   			 'remember_token' => '',

    	]);

    	

		if ($insert) {
			
			return redirect('ebunga/login')->with('success', 'Your account has been created successfully');
		} 
    }

    function logout(Request $request){
		$request->session()->flush();
		return redirect('/');
	}
}
