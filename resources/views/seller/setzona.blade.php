@extends('layouts/appseller')
@section('content')
<?php 
	use Illuminate\Support\Facades\DB;
 ?>

	<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">Set Zona Product</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">
                    
                  </div>
                	<form method="post" action="{{url('seller/creat-zona')}}">
					 @csrf
					<div id="list-example" class="list-group">
						@foreach($zona as $data)

					  <a id="kel1" class="list-group-item list-group-item-action" href="#" data-toggle="modal" data-target="#aa<?= $data->id_kec ?>">{{$data->nama}}</a>
					  
					 
					 

					  <div class="modal fade" id="aa<?= $data->id_kec ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Select The Village</h5>
					        
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>

					      </div>
					      <div class="modal-body">
					      	<p style="color: blue;"><input type="checkbox" name="all" > choose all</p>
					      
					        <div id="kelurahan">
					        	
					        		
					        	
					        	<?php 

					        		$data_kel =DB::table('tbl_kelurahan')->where('id_kec', $data->id_kec)->get();
					        		
					        	 ?>

					        	 @foreach($data_kel as $data2)
					        	 	<hr>
					        	 	 <input v-model='val' type="checkbox" name="zona[]" value="{{$data2->nama}}"> <label>{{$data2->nama}}</label><br>
   								 @endforeach

   								 <p v-text='val'></p>
							</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <input type="submit" name="kirim" class="btn btn-primary" value="Save">
					      </div>
					      </form>
					    </div>
					  </div>
					</div>

					 @endforeach

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


@endsection