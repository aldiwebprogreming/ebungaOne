<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthSellerController extends Controller
{


	function index(){


		 $prov = DB::table('tbl_provinsi')->get();
		return view('registerSeller',['prov' => $prov]);
	}

	function daftar(Request $request){
		$imgName =  $request->ktp->getClientOriginalName() .'-' . time() . '.' . $request->ktp->extension(); 
		$request->ktp->move(public_path('img'), $imgName);
	}
    
}
