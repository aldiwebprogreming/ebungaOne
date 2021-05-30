<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

class sendEmailController extends Controller
{
   

function index(){
	return view('sendEmail');
}

function send(Request $requset){

	try{
            Mail::send('isiemail', array('pesan' => $request->pesan) , function($pesan) use($request){
                $pesan->to($request->penerima,'Verifikasi')->subject('Verifikasi Email');
                $pesan->from(env('MAIL_USERNAME','didikprab@gmail.com'),'Verifikasi Akun email anda');
            });
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }

}

}
