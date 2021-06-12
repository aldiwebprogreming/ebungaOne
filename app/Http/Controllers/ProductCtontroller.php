<?php

namespace App\Http\Controllers;
use App\product;
use App\payment;
use App\order;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;
use App\Veritrans\Midtrans;

class ProductCtontroller extends Controller
{

   public function __construct()
    {   
        Midtrans::$serverKey = 'SB-Mid-server-VqiavWlWkHCx1F_vaq_OMdvl';
        //set is production to true for production mode
        Midtrans::$isProduction = false;
    }


   function index($slug){


   		$cek_product = product::where('slug',$slug)->count();
   		$product =product::where('slug',$slug)->get();

   		Session::flash('sukses','Produk yang tersedia');
   		Session::flash('gagal','Produk saat ini tidak tersedia');
   		return view('product',['product'=>$product], ['cek_product'=>$cek_product]);
   		
   }

   function card($slug_product, $slug ){


         $tgl            = date("m/d/Y");
         $dua_hari       = mktime(0,0,0,date("n"),date("j")+2,date("Y"));
         $delivery       = date("m/d/Y", $dua_hari);

   		$det_product = product::where(['slug_product' => $slug_product, 'slug' => $slug])->first();

        // var_dump($det_product);
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


   function keranjang($nama_product, Request $request){


          // $cart = session('cart');


         // $cart = [
         //    'images' => $request->input('image'),
         //    'harga' => $request->input('harga'),
         //    'namaa_product' => $request->input('nama_product'),
         //    'kel' => $request->input('kel'),
         //    'kec' => $request->input('kec'),
         //    'kab' => $request->input('kab'),
         //    'prov' => $request->input('prov'),
         //    'jumlah' => $request->input('jumlah'),
         //    'tgl_kirim' => $request->input('tgl_kirim'),
         //    'catatan' => $request->input('catatan'),
         //    'note_papan_bunga' => $request->input('note_papan_bunga'),
         //    'alamat_penerima' => $request->input('alamat_penerima'),
         //    'nama_penerima' => $request->input('nama_penerima'),
         //    'email_penerima' => $request->input('email_penerima'),
         //    'telp_penerima' => $request->input('telp_penerima')
         // ];

     // $cart = session('cart');


     //     $cart["$nama_product"] = [
     //        'images' => $request->input('image'),
     //        'harga' => $request->input('harga'),
     //        'namaa_product' => $request->input('nama_product'),
     //        'kel' => $request->input('kel'),
     //        'kec' => $request->input('kec'),
     //        'kab' => $request->input('kab'),
     //        'prov' => $request->input('prov'),
     //        'jumlah' => $request->input('jumlah'),
     //        'tgl_kirim' => $request->input('tgl_kirim'),
     //        'catatan' => $request->input('catatan'),
     //        'note_papan_bunga' => $request->input('note_papan_bunga'),
     //        'alamat_penerima' => $request->input('alamat_penerima'),
     //        'nama_penerima' => $request->input('nama_penerima'),
     //        'email_penerima' => $request->input('email_penerima'),
     //        'telp_penerima' => $request->input('telp_penerima')
     //     ];



        // baru

        $harga = $request->input('harga');
        $qty = $request->input('jumlah');
        $total_harga = $harga * $qty;

        $sess =  session([
            'kode_product' => $request->input('kode_product'),
            'images' => $request->input('image'),
            'kode_product' => $request->input('kode_product'),
            'kode_seller' => $request->input('kode_seller'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'nama_product' => $request->input('nama_product'),
            'kel' => $request->input('kel'),
            'kec' => $request->input('kec'),
            'kab' => $request->input('kab'),
            'prov' => $request->input('prov'),
            'jumlah' => $request->input('jumlah'),
            'harga' => number_format($harga, 0, ',', '.'),
            'total_harga' => number_format($total_harga, 0, ',', '.'),
            'tgl_kirim' => $request->input('tgl_kirim'),
            'catatan' => $request->input('catatan'),
            'note_order' => $request->input('note_order'),
            'alamat_penerima' => $request->input('alamat_penerima'),
            'nama_penerima' => $request->input('nama_penerima'),
            'email_penerima' => $request->input('email_penerima'),
            'telp_penerima' => $request->input('telp_penerima')
         ]);

         // Endbaru






        //  $product = $cart;
        // $ses = Session::put("product",$product);
        // $value = session()->get('product');

        //  $harga  = $value['harga'];
        //  $namaPenerima =  $value['nama_penerima'];
        //  $emailPenerima =  $value['email_penerima'];
        //  $phonePenerima =  $value['telp_penerima'];

        // $harga  = $cart["$nama_product"]['harga'];
        //  $namaPenerima =  $cart["$nama_product"]['nama_penerima'];
        //  $emailPenerima =  $cart["$nama_product"]['email_penerima'];
        //  $phonePenerima =  $cart["$nama_product"]['telp_penerima'];

         $harga  = session('harga');
         $namaPenerima =  session('nama_penerima');
         $emailPenerima =  session('email_penerima');
         $phonePenerima =  session('telp_penerima');

 
        

           return view('coba2', ['namaPenerima' => $namaPenerima, 'harga' => $harga, 'emailPenerima' => $emailPenerima, 'phonePenerima' => $phonePenerima]);

   }

   public function token($nama_product, $harga, $namaPenerima, $emailPenerima, $phonePenerima){

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
                 'gross_amount' => "$harga",
             ),
             'customer_details' => array(
                 'first_name' => "$namaPenerima",
                 // 'last_name' => '',
                 'email' => "$emailPenerima",
                 'phone' => "$phonePenerima",
             ),
         );
          
         $snapToken = \Midtrans\Snap::getSnapToken($params);

         return $snapToken;

   

   }


   public function token2($harga){

        error_log('masuk ke snap token dri ajax');
        $midtrans = new Midtrans;

        $transaction_details = array(
            'order_id'      => uniqid(),
            'gross_amount'  => 200000
        );

        // Populate items
        $items = [
            array(
                'id'        => 'item1',
                'price'     => 200000,
                'quantity'  => 1,
                'name'      => 'Adidas f50'
            )
        ];

        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Setiawan",
            'address'       => "Karet Belakang 15A, Setiabudi.",
            'city'          => "Jakarta",
            'postal_code'   => "51161",
            'phone'         => "081322311801",
            'country_code'  => 'IDN'
            );

        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => "John",
            'last_name'     => "Watson",
            'address'       => "Bakerstreet 221B.",
            'city'          => "Jakarta",
            'postal_code'   => "51162",
            'phone'         => "081322311801",
            'country_code'  => 'IDN'
            );

        // Populate customer's Info
        $customer_details = array(
            'first_name'      => "Andri",
            'last_name'       => "Setiawan",
            'email'           => "andrisetiawan@asdasd.com",
            'phone'           => "081322311801",
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour', 
            'duration'   => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );
    
        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //return redirect($vtweb_url);
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
   }

    public function finish(Request $request)
    {
        $result = $request->input('result_data');
        $result = json_decode($result, true);
        echo $result['status_message'] . '<br>';
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>' ;

        $kode_product = $request->input('kode_product');
        $name = $request->input('name');
        $email = $request->input('email');
        $status_code =  $result['status_code'];
        $order_id = $result['order_id'];
        $gross_amount = $result['gross_amount'];
        $payment_type = $result['payment_type'];
        $transaction_time = $result['transaction_time'];
        $transaction_status = $result['transaction_status'];

       $input = DB::table('tbl_payment')->insert([
                'kode_product' => $kode_product,
                'name_buyer' => $name,
                'email_buyer' => $email,
                'order_id' => $order_id,
                'gross_amaount' => $gross_amount,
                'payment_type'=> $payment_type,
                'transaction_time'=> $transaction_time,
                'transaction_status' => $transaction_status
                
            ]);   


                    $user =  DB::table('tbl_order')->insert([
                            'order_id' => $order_id,
                            'kode_product' => $kode_product,
                            'kode_seller' => session('kode_seller'),
                            'name_buyer' => $name,
                            'kategori' => session('kategori'),
                            'waktu' => $transaction_time,
                            'tgl_kirim' =>session('tgl_kirim'),
                            'catatan' =>session('catatan'), 
                            'catatan_pesanan' => session('note_order'),
                            'alamat_penerima' => session('alamat_penerima'),
                            'nama_penerima' => session('nama_penerima'),
                            'email_penerima' => session('email_penerima'),
                            'telp_penerima' => session('telp_penerima'),
                            'harga' => session('harga'),
                            'qty' => session('jumlah'),
                            'total' => session('total_harga'),
                            'status' => $transaction_status,
                        ]);
              

     return redirect("ebunga/list-order/");
        

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

    function hapuskeranjang(Request $request){
        $request->session()->forget(['images','harga','nama_product','tgl_kirim','kel','kec','kab','prov','jumlah','catatan','note_papan_bunga','nama_penerima','alamat_penerima','telp_penerima']);
        return redirect('/');
    }


function listOrderBuyer(){

    $name_buyer = session('name_buyer');
    $list_order = DB::table('tbl_order')->where('name_buyer', $name_buyer)->get();
    return view('list_order',['list_order' => $list_order]);

}


}
