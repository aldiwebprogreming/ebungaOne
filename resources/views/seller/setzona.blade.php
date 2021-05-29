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
					  <a v-on:click.stop="" class="list-group-item list-group-item-action" href="#">Item 1</a>
					  <a class="list-group-item list-group-item-action" href="#list-item-2">Item2</a>
					  <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
					  <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
					</div>

					</form>
                 
                </div>
              </div>
		</div>
		</div>
		





@endsection