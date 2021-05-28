@extends('layouts/appseller')

@section('content')
		

		<div class="content-wrapper">
			<div class="card">
                <div class="card-body">
                  <p class="card-title">Upload Product</p>
                  <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                  <div class="d-flex flex-wrap mb-5">
                    
                  </div>
                  <form  method="post" action="{{url('upload/product')}}">
					 @crsf
                  	<div class="row">
                  		<div class="col-sm-6">
						  <div class="form-group">
						    <label for="exampleFormControlInput1">Category / Kategori *</label>
						    <select class="form-control" name="katagori">
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
					    <input type="text" name="sub_katagori" class="form-control" placeholder="Masukan nama product" required="">
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
					    <input type="text" name="sub_product" class="form-control" placeholder="Masukan sub product" required="">
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
					    <input type="file" name="gambar" required="">
					  </div>
					 </div>


					<div class="col-sm-3">
					   <div class="form-group">
					    <label for="exampleFormControlInput1">Images Product Two / Gambar Produk Dua *</label>
					    <input type="file" name="gambar" required="">
					  </div>
					 </div>


					<div class="col-sm-3">
					   <div class="form-group">
					    <label for="exampleFormControlInput1">Images Product Three / Gambar Produk Tiga *</label>
					    <input type="file" name="gambar" required="">
					  </div>
					 </div>
					  
					  </div>

					  <input type="submit" name="upload" name="upload" class="btn btn-primary" value="Upload">
					</form>
                 
                </div>
              </div>
		</div>

@endsection