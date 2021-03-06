@extends('layouts/app')

@section('title','card')

@foreach($cari as $ctr => $val)	
@endforeach

<?php $jml = count($cari) ?>

@section('shop')
	{{$jml}}
@endsection


@section('content')





	<div class="container">
	<section id="contact" class="contact">
      <div class="container">
	     <div class="row">	     	

          <div class="col-lg-8 d-flign-items-stretch">
            <div class="info">
              <div class="row">
                <div class="col-md-5">
                   <center>
                  <img src="{{ url('assets')}}/{{$val['images']}}" style="height: 100px;"><br>
                   
                    <a href="" class="btn btn-danger badge badge-danger mt-3">Hapus Keranjang</a>
                    </center>
                </div>

                <div class="col-md-7">
                  <h3 style="margin-bottom: 10px;">{{$val['namaa_product']}}</h3>

                  <div class="row">
                	<div class="col-sm-6 mb-4">
                		<small style="font-weight: bold;">Nama Penerima</small><br>
                		<small>{{$val['nama_penerima']}}</small>
                	</div>

                	<hr>

                	<div class="col-sm-6 mb-4">
                		<small style="font-weight: bold;">Tgl.Pingiriman</small><br>
                		<small>{{$val['tgl_kirim']}}</small>
                	</div>
                	<hr>

                	<div class="col-sm-6 mb-4">
                		<small style="font-weight: bold;">Email Penerima</small><br>
                		<small>{{$val['email_penerima']}}</small>
                	</div>

                	<div class="col-sm-6 mb-4">
                		<small style="font-weight: bold;">Tlp.Penerima</small><br>
                		<small>{{$val['telp_penerima']}}</small>
                	</div>

                	<div class="col-sm-6 mb-4">
                		<small style="font-weight: bold;">Catatan</small><br>
                		<small>{{$val['catatan']}}</small>
                	</div>

                	<div class="col-sm-6 mb-4">
                		<small style="font-weight: bold;">Catatan Papan Bunga</small><br>
                		<small>{{$val['note_papan_bunga']}}</small>
                	</div>

                	<div class="col-sm-12 mb-4">
                		<small style="font-weight: bold;">Alamat Penerima</small><br>
                		<small>{{$val['kel']}} {{$val['kec']}} {{$val['kab']}} {{$val['prov']}}</small>
                	</div>


                	<h4 style="float: right; color: orange;">Harga : Rp  {{$val['harga']}} </h4>

                </div>

                </div>


              </div>
            	
            </div>

          </div>
<!-- 
          <form method="post" action="Checkout">
           @csrf -->
           <div class="col-sm-4">
        	<div class="card bg-light mb-3" style="">
			  <div class="card-header">Summary</div>
			  <div class="card-body">
			    <small style="font-size: 20px;">Grand total</small>
			    <small class="float-right" style="font-size: 20px;">Rp.{{$val['harga']}} </small>
			    <hr>
			    
            
			    <input type="checkbox" name="setuju" value="" class="setuju" id="setuju" required=""> Dengan ini saya menyetujui syarat dan ketentuanini  ?
			     <hr>
			     <center>
			    	 <button id="pay-button" class="btn btn-primary" disabled="" >Checkout</button>
			     </center>
			 
			  </div>
			</div>
        	</div>

          <pre><div id="result-json">JSON result will appear here after payment:<br></div>

        	
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Z2LydbaBsw1YLmaN"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>






    
        </div>



      </div>
    </section>
	</div>


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){   
    $('.setuju').click(function(){
      if($(this).is(':checked')){
        $('#pay-button').removeAttr('disabled','');
      }else{
        $('#pay-button').attr('disabled','');
      }
    });
  });
</script>

  