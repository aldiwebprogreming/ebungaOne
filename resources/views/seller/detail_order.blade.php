@extends('layouts/appseller')
@section('content')

	<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">Detail Order {{$detail->order_id}}</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                 

              <div class="pesanan">
                <div class="row">
                  <div class="col-sm-6">
                      <small style="font-weight: bold;">Informasi Pesanan</small>
                      <hr>

                      <table class="table table-striped">
                         
                          <tbody>
                            <tr>
                              <td>Order Id</td>
                              <td>:</td>
                              <td>{{$detail->order_id}}</td>
                            </tr>
                            <tr>
                              <td>Date Order</td>
                              <td>:</td>
                              <td>{{$detail->waktu}}</td>
                            </tr>

                            <tr>
                              <td>Status</td>
                              <td>:</td>
                              <td>{{$detail->status}}</td>
                            </tr>

                            <tr>
                              <td>Writing On Order</td>
                              <td>:</td>
                              <td>{{$detail->catatan_pesanan}}</td>
                            </tr>
                            
                          </tbody>
                        </table>
                  </div>

                  <div class="col-sm-6">
                     <small style="font-weight: bold;">Informasi Pengiriman</small>
                      <hr>

                      <table class="table table-striped">
                         
                          <tbody>
                            <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td>{{$detail->email_penerima}}</td>
                            </tr>
                            <tr>
                              <td>Country</td>
                              <td>:</td>
                              <td>Indonesia</td>
                            </tr>

                            <tr>
                              <td>Address</td>
                              <td>:</td>
                              <td>{{$detail->alamat_penerima}}</td>
                            </tr>

                            <tr>
                              <td>Phone</td>
                              <td>:</td>
                              <td>{{$detail->telp_penerima}}</td>
                            </tr>
                            
                          </tbody>
                        </table>
                  </div>


                  <div class="col-sm-6" style="margin-top: 50px;">
                      <small style="font-weight: bold;">Informasi Pemesan</small>
                      <hr>

                      <table class="table table-striped">
                         
                          <tbody>
                            <tr>
                              <td>Name</td>
                              <td>:</td>
                              <td>{{$detail->name_buyer}}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td>{{$detail->email_penerima}}</td>
                            </tr>

                           

                            <tr>
                              <td>Phone</td>
                              <td>:</td>
                              <td>{{$detail->telp_penerima}}</td>
                            </tr>
                            
                          </tbody>
                        </table>
                  </div>

                </div>
              </div>
            </div>

                    
                    
                  </div>
        
                 
                </div>
              </div>
		</div>

		</div>



	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    $('#order').DataTable();
} );
</script>

<script>


  const vm = new Vue({
    el: "#app",
    data: function(){
      return{
        gambar: '',
       	nama: 'aldi',
       	list : false,
       	val : [],
        

      }
    },

    
  })
</script>

<script>
	// $(document).ready(function(){

	// 	$("#kel1").click(function(){
	// 		var id = 5;
	// 	var url = "<?= url('seller/listkelurahan/')  ?>/"+id;
 //        $("#kecamatan").load(url);
	// 	})

	// })
</script>

@include('sweetalert::alert')

@endsection