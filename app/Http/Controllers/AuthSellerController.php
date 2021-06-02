<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
			if (password_verify($pass, $cek->password)) {
				session(['email' => $email]);
				return redirect('/seller');
			}else {
				echo "password anda salah";
			}
		} else {
			echo "akun anda salah";
		}

		
			
		
	}
    
}
