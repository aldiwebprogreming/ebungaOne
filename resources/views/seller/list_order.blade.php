@extends('layouts/appseller')
@section('content')

	<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">List Order</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">

                    <table id="order" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                   <th>Order Id</th>
                                  <th>Kode Product</th>
                                  <th>Kategori</th>
                                  <th>Buyer</th>
                                  <th>Delivery Date</th>
                                  <th>Order Status</th>


                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1 ?>
                              @foreach($list_order as $data)
                              <tr>
                                  <td><a href="{{url('seller/detail-order/')}}/{{$data->order_id}}">{{$data->order_id}}</a></td>
                                  <td>{{$data->kode_product}}</td>
                                  <td>{{$data->kategori}}</td>
                                  <td>{{$data->name_buyer}}</td>
                                  <td>{{$data->tgl_kirim}}</td>
                                  <td><a href="#" class="btn btn-primary">{{$data->status}}</a></td>
                                 <!--  <td>{{$data->qty}}</td> -->
                              </tr>
                              @endforeach
                              
                          </tbody>
                          <tfoot>
                              <tr>
                                   <th>Order Id</th>
                                  <th>Kode Product</th>
                                  <th>Kategori</th>
                                  <th>Buyer</th>
                                  <th>Delivery Date</th>
                                  <th>Order Status</th>
                              </tr>
                          </tfoot>
                      </table>
                    
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