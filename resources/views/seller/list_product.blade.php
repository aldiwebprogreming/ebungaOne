@extends('layouts/appseller')
@section('content')

	<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">List Product</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th scope="col">No</th>
                          <th scope="col">Kode Poroduct</th>
                          <th scope="col">Name Product</th>
                          <th scope="col">Product Zona</th>
                          <th scope="col">Date</th>
                           <th scope="col">Status</th>
                           <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach($product as $data)
                        
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$data->kode_product}}</td>
                          <td>{{$data->nama_product}}</td>
                          <td>{{$data->slug}}</td>
                          <td>{{$data->date_upload}}</td>
                          <td>
                            @if($data->status == 1)
                              Approved
                            @endif
                            Pending
                          </td>
                          <td>
                            <a href="#" class="badge badge-primary btn btn-primary">Edit</a>
                            <a href="#" class="badge badge-danger btn btn-danger">Delete</a>
                          </td>
                        </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                    
                  </div>
            
					
                 
                </div>
              </div>
		</div>

		</div>



	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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