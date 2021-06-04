@extends('layouts/appseller')
@section('content')

	<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">List Zona Product</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th scope="col">Sub District</th>
                          <th scope="col">Urban Village</th>
                          <th scope="col">Postal Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($list as $data)
                        <tr>
                         
                          <td>{{$data->kec}}</td>
                          <td>{{$data->kel}}</td>
                          <td>--</td>
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