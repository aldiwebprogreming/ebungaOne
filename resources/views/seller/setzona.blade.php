@extends('layouts/appseller')
@section('content')

<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">Set Zona Product</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">
                    
                  </div>
                  <form  method="post" action="{{url('upload')}}" enctype="multipart/form-data">
					 @csrf
					<div id="list-example" class="list-group">
						@foreach($zona as $data)

					  <a id="kel1" v-on:click='submit($event, <?= $data->id_kec ?>)' class="list-group-item list-group-item-action" href="#" data-toggle="modal" data-target="#exampleModal">{{$data->nama}}</a>
					  
					  <div dir="list">
					  	
					  </div>
					 

					  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Select The Village</h5>
					        
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>

					      </div>
					      <div class="modal-body">
					      	<p style="color: blue;"><input type="checkbox" name="all" v-model="val"> choose all</p>
					      	
					        <div id="kecamatan">

			
							</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>

					 @endforeach

					</div>

					</form>

					
                 
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
       	val : '',
        

      }
    },

    methods: {
      submit: function(event, id_kec){
         event.preventDefault()
      	var id = id_kec
      	var url = "<?= url('seller/listkelurahan/')  ?>/"+id;
        $("#kecamatan").load(url);       
      },

      

    }
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