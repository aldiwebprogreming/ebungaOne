<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Session;

class AuthSellerController extends Controller
{


	function index(){


		 $prov = DB::table('tbl_provinsi')->get();
		return view('registerSeller',['prov' => $prov]);
	}

	function daftar(Request $request){
		$imgName =  $request->ktp->getClientOriginalName() .'-' . time() . '.' . $request->ktp->extension(); 
		$request->ktp->move(public_path('img'), $imgName);

		$imgName2 =  $request->npwp->getClientOriginalName() .'-' . time() . '.' . $request->npwp->extension(); 
		$request->npwp->move(public_path('img'), $imgName2);

		$imgName3 =  $request->siup->getClientOriginalName() .'-' . time() . '.' . $request->siup->extension(); 
		$request->siup->move(public_path('img'), $imgName3);

		$kode = rand(1, 100000);
		$kode_seller = "EBG".$kode;


		$insert = DB::table('tbl_akun_seller')->insert([
			'kode_seller' => $kode_seller,
			'full_neme' => $request->full_name,
			'email' => $request->email,
			'no_hp' => $request->nohp,
			'password' => password_hash($request->password1, PASSWORD_DEFAULT),
			'negara' => $request->negara,
			'provinsi' => $request->provinsi,
			'kabupaten' => $request->kabupaten,
			'kecamatan' => $request->kecamatan,
			'ktp' => $imgName,
			'npwp' => $imgName2,
			'siup' => $imgName3,
			'status' => 0,

			
		]);

		// fitur send email
		$nama = $request->full_name;
		$kode = $kode_seller;
		$link = "http://localhost:8000/seller/aktivasi";
		Mail::to($request->email)->send(new SendEmail($nama, $kode, $link));
		// Endfitur send email

		if ($insert) {
			Session::flash('sukses','Ini notifikasi SUKSES');
				return redirect('seller/login');
		}else {
			echo "gagal";
		}
	}


	function login(){

		return view('login_seller');
	}


	function store(Request $request){
		$request->validate([

			'email' => 'required',
	        'password' => 'required',
	        // 'hp' => 'required|max:13|min:11',
	        // 'alamat' => 'required',
	        // 'bio' => 'required',
		]);

		$email = $request->email;
		$pass = $request->password;


		$cek = DB::table('tbl_akun_seller')->where('email', $email)->first();
		// echo $cek->email;
		
		if ($cek == true) {
			if($cek->status == 0){
				return redirect('seller/login')->with('toast_error', 'Activate your account');
			}
			else if (password_verify($pass, $cek->password)) {
				session([
					'email' => $email,
					'name' => $cek->full_neme,
					'prov' => $cek->provinsi,
					'kab' => $cek->kabupaten,
					'kec' => $cek->kecamatan,
					'kode_seller' => $cek->kode_seller

				]);
				return redirect('/seller');
			}else {
				 return redirect('seller/login')->with('toast_error', 'Password wrong');
			}
		} else {
			 return redirect('seller/login')->with('toast_error', 'Account wrong');
		}

		
			
		
	}

	function aktivasi($seller){
		$affected = DB::table('tbl_akun_seller')
              ->where('kode_seller', $seller)
              ->update(['status' => 1]);

              if ($affected) {
              		return redirect('seller/login')->with('success', 'Successful activation');;
              }
	}

	function logout(Request $request){
		$request->session()->flush();
		return redirect('seller/login');
	}
    
}
