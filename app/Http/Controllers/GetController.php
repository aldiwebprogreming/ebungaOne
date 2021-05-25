<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GetController extends Controller
{
   


   function index($idprov){

   	$kab = DB::table('tbl_kabupaten')->where('id_prov', $idprov)->get();
   	return view('get/kabupaten',['kab' => $kab]);
   }

   function getkec($idkec){
 	$kec = DB::table('tbl_kecamatan')->where('id_kab', $idkec)->get();
   	return view('get/kecamatan',['kec' => $kec]);
  
   }
}
