<?php

namespace App\Http\Controllers;
use App\product;

use Illuminate\Http\Request;
use Session;

class ProductCtontroller extends Controller
{
   function index($slug){


   		$cek_product = product::where('slug',$slug)->count();
   		$product =product::where('slug',$slug)->get();

   		Session::flash('sukses','Produk yang tersedia');
   		Session::flash('gagal','Produk saat ini tidak tersedia');
   		return view('product',['product'=>$product], ['cek_product'=>$cek_product]);
   		
   }

   function card($nama_product){


         $tgl            = date("m/d/Y");
         $dua_hari       = mktime(0,0,0,date("n"),date("j")+2,date("Y"));
         $delivery       = date("m/d/Y", $dua_hari);

   		$det_product = product::where('slug_product', $nama_product)->first();
   		return view('card',['detail' => $det_product],['tgl' => $delivery]);
   }

   

   function tamabahSession($nama_product, Request $request){

          $cart = session('cart');


         $cart["$nama_product"] = [
            'images' => $request->input('image'),
            'harga' => $request->input('harga'),
            'namaa_product' => $request->input('nama_product'),
            'kel' => $request->input('kel'),
            'kec' => $request->input('kec'),
            'kab' => $request->input('kab'),
            'prov' => $request->input('prov'),
            'jumlah' => $request->input('jumlah'),
            'tgl_kirim' => $request->input('tgl_kirim'),
            'catatan' => $request->input('catatan'),
            'note_papan_bunga' => $request->input('note_papan_bunga'),
            'alamat_penerima' => $request->input('alamat_penerima'),
            'nama_penerima' => $request->input('nama_penerima'),
            'email_penerima' => $request->input('email_penerima'),
            'telp_penerima' => $request->input('telp_penerima')
         ];

         // $request->session()->push('cart', [
         //    'jumlah' => '1',
         //    'tgtl_kirim' => '1',
         //    'catatan' => '1',
         //    'note_papan_bunga' => '1',
         //    'alamat_penerima' => '1',
         //    'nama_penerima' => '1',
         //    'email_peneriam' => '1',
         //    'telp_penerima' => '1',
         // ]);

         // $session = session(['cart']);

         $harga  = $cart["$nama_product"]['harga'];
         $namaPenerima =  $cart["$nama_product"]['nama_penerima'];
         $emailPenerima =  $cart["$nama_product"]['email_penerima'];
         $phonePenerima =  $cart["$nama_product"]['telp_penerima'];

         $snapToken = $this->token($harga, $namaPenerima, $emailPenerima, $phonePenerima);
         return view('coba', ['cari' => $cart], ['snapToken' => $snapToken]);
     
   }

   public function token($harga, $namaPenerima, $emailPenerima, $phonePenerima){

      // Set your Merchant Server Key
         \Midtrans\Config::$serverKey = 'SB-Mid-server-VqiavWlWkHCx1F_vaq_OMdvl';
         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
         \Midtrans\Config::$isProduction = false;
         // Set sanitization on (default)
         \Midtrans\Config::$isSanitized = true;
         // Set 3DS transaction for credit card to true
         \Midtrans\Config::$is3ds = true;
          
         $params = array(
             'transaction_details' => array(
                 'order_id' => rand(),
                 'gross_amount' => $harga,
             ),
             'customer_details' => array(
                 'first_name' => "$namaPenerima",
                 // 'last_name' => '',
                 'email' => $emailPenerima,
                 'phone' => $phonePenerima,
             ),
         );
          
         $snapToken = \Midtrans\Snap::getSnapToken($params);

         return $snapToken;

   

   }


   function cart($nama_product){

         $cart = session("cart");

        return view('coba')->with("cari", $cart);

   }


   // function detail(Request, $request){

   //       $detail = Product::where('slug_product', $nama_product)->first();

   //       $cart = session('cart');


   //       $cart["$nama_product"] = [
   //          'jumlah' => $request->input('jumlah'),
   //          'tgl_kirim' => $request->input('tgl_kirim'),
   //          'catatan' => $request->input('catatan'),
   //          'note_papan_bunga' => $request->input('note_papan_bunga'),
   //          'alamat_penerima' => $request->input('alamat_penerima'),
   //          'nama_penerima' => $request->input('nama_penerima'),
   //          'email_peneriam' => $request->input('email_penerima'),
   //          'telp_penerima' => $request->input('telp_penerima')
   //       ];

   //       $session = session(['card']);


   //       // return view('detail',['detail'=> $detail],);

   // }

    function finish(){

      
    }


}
