@extends('layouts/app')
@section('title','Detail')

<?php $jml = count($cari) ?>

@section('shop')
  {{$jml}}
@endsection


@section('content')

	<div class="container">
		<section id="contact" class="contact">
      <div class="container">
	     <div class="row">	     	

          <div class="col-lg-8 d-flign-items-stretch">
            <div class="info">
              <div class="row">
                <div class="col-md-5">
                  <img src="{{ url('assets')}}/{{$detail->images}}" style="height: 100px;"><br>
                    <a href="" class="btn btn-primary mt-3">Hapus</a>
                </div>

                <div class="col-md-7">
                  <small>Variant</small>
                </div>

              </div>
            	
            </div>

          </div>



          <div class="col-lg-7 mt-2 mt-lg-0 d-flex align-items-stretch">

            

            </form>
          </div>

        </div>

      </div>
    </section>
	</div>
	

	@endsection


 
