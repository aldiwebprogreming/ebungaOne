<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    function index(){
    	$nama = "Aldi";
    	Mail::to("alldii1956@gmail.com")->send(new SendEmail($nama));
 
		return "Email telah dikirim";
    }
}
