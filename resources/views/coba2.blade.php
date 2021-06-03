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
                  <img src="{{ url('img_product')}}/{{$val['images']}}" style="height: 100px;"><br>
                   
                    <a href="{{ url('hapuskeranjang') }}" class="btn btn-danger badge badge-danger mt-3">Hapus Keranjang</a>
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
              
            <?php
              $auth = Auth::user();
             ?>
            
             @if($auth == false) 
			     <center>

              <!-- Button trigger modal -->
              <button type="button" id="pay-button1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" disabled="">
                Chectout
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">login</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                       <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                    </div>
                    
                  </div>
                </div>
              </div>

			    	
			     </center>

           @else
            <center>
             <button id="pay-button" class="btn btn-primary" disabled="" >Checkout</button>
           </center>
           @endif
			 
			  </div>
			</div>
      </div>

      <!--  aksi mitrans -->

        <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-Z2LydbaBsw1YLmaN"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



        @if($auth == true)

          <?php 

            $name = Auth::user()->name;
            $email = Auth::user()->email;

           ?>

        <form id="payment-form" method="post" action="snapfinish">
          <input type="hidden" name="name" value="<?= Auth::user()->name ?>">
          <input type="hidden" name="email" value="<?= Auth::user()->email  ?>">
          <input type="hidden" name="no_hp" value="<?= $phonePenerima ?>">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <input type="hidden" name="result_type" id="result-type" value=""></div>
          <input type="hidden" name="result_data" id="result-data" value=""></div>
        </form>

        @else 

          <?php 

              $name = '';
              $email = ''

           ?>
      @endif

    
    <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      
      url: "./snaptoken/<?= $harga?>/<?= $name ?>/<?= $email ?>/<?= $phonePenerima ?>",
      cache: false,
      success: function(data) {
        //location = data;
        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');
        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }
        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });
  </script>

 <!--  end aksi mitrans -->




    
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
        $('#pay-button1').removeAttr('disabled','');
      }else{
        $('#pay-button').attr('disabled','');
      }
    });
  });
</script>

  