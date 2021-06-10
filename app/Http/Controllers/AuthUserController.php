<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
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

            if ($user->active == 0) {
               return redirect('ebunga/login')->with('toast_error', 'Activate your account');
            }
    		else if (password_verify($pass, $user->password)) {
    			session([
    				'name_buyer' => $user->name,
    				'email_buyer' => $user->email,
    			]);
    			return redirect('/');
    		}else {
    			return redirect('ebunga/login')->with('toast_error', 'Password wrong');
    		}
    	} else {
    		return redirect('ebunga/login')->with('toast_error', 'account wrong');
    	}
    }

    function cek_loginshop(Request $request){

        $link =  $request->link;

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
                return redirect("$link");
            }else {
                return header("Location: https://mywebz.com/dir");
            }
        } else {
            return header("Location: https://mywebz.com/dir");
        }
    }


    function register(){

     return view('register_user');
    }

    function creat(Request $request){

        $kode = rand(1, 100000);
        $kode_buyer = "BYR".$kode;

    	$insert = DB::table('login_users')->insert([
            'kode_buyer' => $kode_buyer,
    		'name' => $request->full_name,
   			 'email' => $request->email,
   			 'password' => password_hash($request->password1, PASSWORD_DEFAULT),
   			 'remember_token' => '',
             'active' => 0,

    	]);

    	$nama = $request->full_name;
        $kode = $kode_buyer;
        $link = "http://localhost:8000/ebunga/aktivasi";
        Mail::to($request->email)->send(new SendEmail($nama, $kode, $link));

		if ($insert) {
			
			return redirect('ebunga/login')->with('success', 'Your account has been created successfully');
		} 
    }

    function aktivasi($kode_buyer){
        $affected = DB::table('login_users')
              ->where('kode_buyer', $kode_buyer)
              ->update([
                'active' => 1, 
        
            ]);

              if ($affected) {
                    return redirect('ebunga/login')->with('success', 'Successful buyer account activation');
              }
    }

    function logout(Request $request){
		$request->session()->flush();
		return redirect('/');
	}
}
