<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BayarController extends Controller
{
    

    function render(){

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
			        'gross_amount' => 10000,
			    ),
			    'customer_details' => array(
			        'first_name' => 'Aldi',
			        'last_name' => 'SUKSES',
			        'email' => 'Aldi.pra@example.com',
			        'phone' => '08111222333',
			    ),
			);
			 
			$snapToken = \Midtrans\Snap::getSnapToken($params);

			return view('bayar',['snapToken' => $snapToken]);

    }
}
