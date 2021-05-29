@extends('layouts/appseller')

@section('content')
		
		<div id="app">
		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">Upload Product</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">
                    
                  </div>
                  <form  method="post" action="{{url('upload')}}" enctype="multipart/form-data">
					 @csrf
                  	<div class="row">
                  		<div class="col-sm-6">
						  <div class="form-group">
						    <label for="exampleFormControlInput1">Category / Kategori *</label>
						    <select class="form-control" name="kategori">
						    	<option>Bunga</option>
						    	<option>Parcel</option>
						    	<option>Papan Bunga</option>
						    	<option>Cake</option>
						    </select>
						  </div>
						 </div>
					<div class="col-sm-6">


					   <div class="form-group">
					    <label for="exampleFormControlInput1">Name Product / Nama Product</label>
					    <input type="text" name="nama_product" class="form-control" placeholder="Masukan nama product" required="">
					  </div>

					</div>

					<div class="col-sm-6">

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Sub Product *</label>
					    <input type="text" name="sub_product" class="form-control" placeholder="Masukan sub product" required="">
					  </div>

					 </div>


					 <div class="col-sm-6">
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Deks Product</label>
					    <textarea class="form-control" name="deks_product" placeholder="Masukan deks product" required=""></textarea>
					  </div>
					 </div>

					
					 <div class="col-sm-6">
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Price / Harga</label>
					    <input type="text" name="harga" class="form-control" placeholder="Masukan sub product" required="">
					  </div>
					</div>

		

					 <div class="col-sm-6">
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Qty per Day / Jumlah Perhari *</label>
					    <input type="number" name="qty" class="form-control" placeholder="Masukan jumlah stok" required="">
					  </div>
					</div>

					<div class="col-sm-3">
					   <div class="form-group">
					    <label for="exampleFormControlInput1">Images Product One / Gambar Produk Utama *</label>
					     <input type="file" v-on:change="upload($event)" class="form-control" placeholder="Enter file" name="gambar1" id="gambar1">
     				 	<p><img :src="preview" v-if="preview" style="height: 100px; margin-top: 30px; "></p>
       					 <button  v-on:click="deleteimg" v-if="preview" class="badge badge-danger">Delete file</button>
					  </div>
					 </div>


					<div class="col-sm-3">
					   <div class="form-group">
					    <label for="exampleFormControlInput1">Images Product Two / Gambar Produk Dua *</label>
					    <input type="file" v-on:change="upload2($event)" class="form-control" placeholder="Enter file" name="gambar2" id="gambar2">
     				 	<p><img :src="preview2" v-if="preview2" style="height: 100px; margin-top: 30px; "></p>
       					 <button  v-on:click="deleteimg2" v-if="preview2" class="badge badge-danger">Delete file</button>
					  </div>
					 </div>


					<div class="col-sm-3">
					   <div class="form-group">
					    <label for="exampleFormControlInput1">Images Product Three / Gambar Produk Tiga *</label>
					    <input type="file" v-on:change="upload3($event)" class="form-control" placeholder="Enter file" name="gambar3" id="gambar3">
     				 	<p><img :src="preview3" v-if="preview3" style="height: 100px; margin-top: 30px; "></p>
       					 <button  v-on:click="deleteimg3" v-if="preview3" class="badge badge-danger">Delete file</button>
					  </div>
					 </div>
					  
					  </div>


	

					 <h3 v-text="pesan"></h3>

					  <input type="submit" name="upload" name="upload" class="btn btn-primary" value="Upload">
					</form>
                 
                </div>
              </div>
		</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

		<script>
  const vm = new Vue({
    el: "#app",
    data: function(){
      return{
        gambar: '',
        preview: '',

        gambar2: '',
        preview2: '',


        gambar3: '',
        preview3: '',
        

      }
    },

    methods: {
      upload: function(event){
        // console.log(event.target.files[0].name)
        var namagambar = event.target.files[0].name
        this.gambar = namagambar
        this.preview = URL.createObjectURL(event.target.files[0])
      },

      deleteimg: function(){
        this.preview = ''
        $("#gambar1").val('')
      },

      upload2: function(event){
        // console.log(event.target.files[0].name)
        var namagambar2 = event.target.files[0].name
        this.gambar2 = namagambar2
        this.preview2 = URL.createObjectURL(event.target.files[0])
      },

      deleteimg2: function(){
        this.preview2 = ''
        $("#gambar2").val('')
      },

      upload3: function(event){
        // console.log(event.target.files[0].name)
        var namagambar3 = event.target.files[0].name
        this.gambar3 = namagambar3
        this.preview3 = URL.createObjectURL(event.target.files[0])
      },

      deleteimg3: function(){
        this.preview3 = ''
        $("#gambar3").val('')
      },


    
     

     

    }
  })
</script>

@include('sweetalert::alert')

@endsection
