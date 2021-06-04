<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        $kode_seller = session('kode_seller');
        $id_prov = session('prov');
        $id_kab = session('kab');
        $id_kec = session('kec');

        $zona_seller = DB::table('tbl_area')->where('kode_seller', $kode_seller)->get();
        $prov = DB::table('tbl_provinsi')->where('id_prov', $id_prov)->first();
        $kab = DB::table('tbl_kabupaten')->where('id_kab', $id_kab)->first();
        // $kec = DB::table('tbl_kecamatan')->where('id_kec', $id_kec)->first();

        $str = $kab->nama;
        $seleksi = ltrim($str, "KAB.");
        $slug_product = strtolower(Str::of("$request->nama_product")->slug('-'));



        foreach ($zona_seller as $data) {
             $slug = strtolower(Str::of($data->kel." ".$data->kec." ".$seleksi." ".$prov->nama)->slug('-'));
            $insert = DB::table('product')->insert([
            'slug' => $slug,
            'kelurahan' => $data->kel,
            'kecamatan' => $data->kec,
            'kabupaten' => ltrim($kab->nama,"KAB."),
            'provinsi' =>$prov->nama,
            'slug_product' => $slug_product,
            'nama_product' => $request->nama_product,
            'keterangan' => $request->deks_product,
            'images'  => $imgName,   
            'harga' => $request->harga       
        ]);

        

        }

        if ($insert == true) {
            return redirect('seller/upload-product')->with('success', 'Task Created Successfully!');
        } else {

            return redirect('seller/upload-product')->with('error', 'Product upload failed');
        }


       




    }


    function setzona(){
      $data = session('kab');
      

    $zona = DB::table('tbl_kecamatan')->where('id_kab', $data)->get();
       return view('seller/setzona',['zona' => $zona]);
    }


    
    function inputzona(Request $request){
        $get = $request->zona;
        $list = count($get);
        $name_seller = session('name');
        $kode_seller = session('kode_seller');
        $prov = session('prov');
        $kab = session('kab');

        $name_kel = $get[0];
        $kel = DB::table('tbl_kelurahan')->where('nama', $name_kel)->first();
        $kec = DB::table('tbl_kecamatan')->where('id_kec', $kel->id_kec)->first();
        $kab1 = DB::table('tbl_kabupaten')->where('id_kab', $kab)->first();
        $prov1 = DB::table('tbl_provinsi')->where('id_prov', $prov)->first();

        for ($i=0; $i < $list ; $i++) { 
                

        $insert_area = DB::table('tbl_area')->insert([
            'nama_seller' => $name_seller,
            'kode_seller' => $kode_seller,
            'kel' => $get[$i],
            'kec' => $kec->nama,
            'kab' => $kab1->nama,
            'provinsi' => $prov1->nama,    
        ]);

        
         } 

      
        return redirect('seller/set-zona')->with('success', 'Set zone successfully');

        
        
    }

    function get_kec($id){

        return DB::table('tbl_kecamatan')->where('id_kec', $id)->first();

    }

    function get_kab(){
        return DB::table('tbl_kabupaten')->where('id_kab', session('kab'))->get();
    }


    function list_zona(){
        $kode = session('kode_seller');
        $get = DB::table('tbl_area')->where('kode_seller', $kode)->get();
        foreach ($get as $data) {
            $kec = DB::table('tbl_area')->where('kec', $data->kec)->first();
        }
        return view('seller/list_zona', ['list' => $get, 'kec' => $kec]);
       
      
    }
}
