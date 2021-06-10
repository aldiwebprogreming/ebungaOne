@extends('layouts/app')

@section('title','Product')



@section('content')
	
 	<!-- @foreach($product as $data)

 	<h3>{{$data->nama_product}}</h3>

 	@endforeach -->


<div class="container">
    <img src="{{ url('assets/slider1.png') }}" alt="" style="width: 100%; border-radius: 15px;">
</div>

	@if ($cek_product == 0)
		<div class="container my-1">
			<section>
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ Session::get('gagal')}}</strong>
				</div>
			</section>
		</div>
	@else

<div class="container my-1">
	<section>
		<h4 class="mt-3 mb-3">Produk Tersedia</h4>
		<hr>
			<div class="container my-1">
			<section>
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ Session::get('sukses')}}</strong>
				</div>
			</section>
		</div>
		<div class="row">
			@foreach($product as $data)


			<div class="col-md-3">
				<div class="card" style="">
				  <img class="card-img-top" src="{{url('img_product')}}/{{$data->images}}" alt="Card image cap">
				  <div class="card-body">
				    <h5 class=" text-center">{{$data->nama_product}}</h5>
				    <p class="card-text text-center">{{$data->keterangan}}</p>
				    <p class="text-center" style="color: green">Rp. <?php echo number_format($data->harga, 0, ',', '.'); ?></p>
				    <center>
				    <a href="card/{{$data->slug_product}}/{{$data->slug}}" class="btn btn-primary">Order</a>
				    </center>
				  </div>
				</div>
			</div>
			@endforeach

		</div>
	</section>
</div>
@endif
	
@endsection