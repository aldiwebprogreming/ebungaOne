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

    	// $request->validate([
    	// 'nama_product' => 'required',
    	// 'sub_product' => 'required',
    	// 'deks_product' => 'required',
    	// 'harga' => 'required',
    	// 'qty' => 'required|max:3',
    	// 'gambar'  => 'required',
    	// 'gambar2' => 'required',
    	// 'gambar3' => 'required'
    	// ]);

        $imgName =  $request->gambar1->getClientOriginalName() .'-' . time() . '.' . $request->gambar1->extension(); 
        $request->gambar1->move(public_path('img_product'), $imgName);


        $insert = DB::table('product')->insert([
            'slug' => '',
            'kelurahan' => '',
            'kecamatan' => '',
            'kabupaten' => '',
            'provinsi' => '',
            'slug_product' => '',
            'nama_product' => $request->nama_product,
            'keterangan' => $request->deks_product,
            'images'  => $imgName,   
            'harga' => $request->harga       
        ]);

        if ($insert == true) {
            return redirect('seller/upload-product')->with('success', 'Task Created Successfully!');
        } else {

            return redirect('seller/upload-product')->with('error', 'Product upload failed');
        }




    }


    function setzona(){
      $data = '1101';

    $zona = DB::table('tbl_kecamatan')->where('id_kab', $data)->get();
       return view('seller/setzona',['zona' => $zona]);
    }


    function listkeluarahan($id){

       // $data = '120509';
         $kel = DB::table('tbl_kelurahan')->where('id_kec', $id)->get();
            return view('seller/get_kel',['kel' => $kel]);
     

    }
}
