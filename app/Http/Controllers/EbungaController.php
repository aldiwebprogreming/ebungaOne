<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinsi;

class EbungaController extends Controller
{


	function index(){

		$prov = provinsi::all();

		return view('ebunga',['prov'=>$prov]);
	}
   
}
