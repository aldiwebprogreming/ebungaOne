<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    function index(){
    		
    	 return view('seller/dashboard');

		
    }

    function upload(){

    	return view('seller/uploadproduct');
    }

    function uploadproduct(Request $request){

    	$request->validate([
    	'nama_product' => 'required',
    	'sub_product' => 'required',
    	'deks_product' => 'required',
    	'harga' => 'required',
    	'qty' => 'required|max:3',
    	'gambar'  => 'required',
    	'gambar2' => 'required',
    	'gambar3' => 'required'
    	]);


    	dd($request);




    }
}
