@extends('layouts/app')

@section('title','ebunga')

@section('content')

<div class="container">
      <img src="{{ url('assets/slider1.png') }}" alt="" style="width: 100%; border-radius: 15px;">
</div>


<div class="container">
  <section class="pilih-liga mt-4">
      <h3><strong>Pilih Produk</strong></h3>
      <div class="row mt-4">
        
         <div class="col md-3" style="">
            <a class="papan-bunga">
               <div class="card shadow">
                  <div class="card-body text-center">
                     <img src="<?= url('assets/papan-bunga.svg') ?>" class="img-fluid" style="height: 50px;">
                  </div>
               </div>
            </a>
         </div>

         <div class="col md-3">
            <a href="roduct/parcel-ebunga">
               <div class="card shadow">
                  <div class="card-body text-center">
                     <img src="{{ url('assets/parcel.svg') }}" class="img-fluid" style="height: 50px;">
                  </div>
               </div>
            </a>
         </div>

         <div class="col md-3">
            <a href="roduct/bunga-ebunga">
               <div class="card shadow">
                  <div class="card-body text-center">
                     <img src="{{ url('assets/bunga.svg')}}" class="img-fluid" style="height: 50px;">
                  </div>
               </div>
            </a>
         </div>

         <div class="col md-3">
            <a href="product/cake-ebunga">
               <div class="card shadow">
                  <div class="card-body text-center">
                     <img src="{{ url('assets/cake.svg')}}" class="img-fluid" style="height: 50px;" class="img-fluid">
                  </div>
               </div>
            </a>
         </div>
        
      </div>
   </section>
</div>


<div class="container">
  <section>
    <div class="judul mt-4">  
     <h2 style="text-align: center;">Tentukan tujuan pengantaran</h2>
     <p style="text-align: center;">Masukkan nama kelurahan tujuan</p>
    </div>

    <select class="js-example-basic-single  form-control" name="state" id="cari">
        <option value='0'>-- Select keluarahan --</option>
        @foreach ($prov as $data)
          <option value="{{Str::slug($data->KELURAHAN)}}-{{Str::slug($data->KECAMATAN)}}-{{Str::slug($data->KABUPATEN)}}-{{Str::slug($data->PROVINSI)}}">{{$data->KELURAHAN}}, {{$data->KECAMATAN}}, {{$data->KABUPATEN}}, {{$data->PROVINSI}}</option>
        @endforeach
        Str::slug($request->get('judul'));

    </select>

  </section>

   <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Ebunga Product</h2>
          <p>List of products that we provide, we will list the products that you might need to give something special to the special person for you</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-bunga">Bunga</li>
              <li data-filter=".filter-papan">Papan Bunga</li>
              <li data-filter=".filter-parcel">Parcel</li>
              <li data-filter=".filter-web">Cake</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

         <!--  produk bunga -->
          <div class="col-lg-4 col-md-6 portfolio-item filter-bunga">
            <img src="assets/product/BUNGABERDIRIART.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Buga Berdiri Art</h4>
              <p>Bunga</p>
              <a href="assets/product/BUNGABERDIRIART.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Bunga Berdiri Art"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-bunga">
            <img src="assets/product/BUNGABERDIRISEGAR.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Bunga Berdiri Segar</h4>
              <p>Bunga</p>
              <a href="assets/product/BUNGABERDIRISEGAR.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Bunga Berdiri Segar"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-bunga">
            <img src="assets/product/BUNGABUKETART.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Bunga Buket Art</h4>
              <p>Bunga</p>
              <a href="assets/product/BUNGABUKETART.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Bunga Buket Art"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <!-- endbunga -->


          <!-- papan bunga -->

          <div class="col-lg-4 col-md-6 portfolio-item filter-papan">
            <img src="assets/product/papan-bunga1.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Papan Bunga Medan</h4>
              <p>Papan Bunga</p>
              <a href="assets/product/papan-bunga3.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Papa Bunga Medan"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-papan">
            <img src="assets/product/papan-bunga3.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Papan Bunga Bandung</h4>
              <p>Papan Bunga</p>
              <a href="assets/product/papan-bunga3.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Papan Bunga Bandung"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

           <!-- endpapan bunga -->

           <div class="col-lg-4 col-md-6 portfolio-item filter-parcel">
            <img src="assets/product/PARCELBUAH.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Parcel Buah</h4>
              <p>Parcel</p>
              <a href="assets/product/PARCELBUAH.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Parcel Buah"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-parcel">
            <img src="assets/product/PARCELKOMBINASI.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Parcel Kombinasi</h4>
              <p>Parcel</p>
              <a href="assets/product/papan-bunga3.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Parcel kombinasi"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-parcel">
            <img src="assets/product/PARCELSEMBAKO.jpeg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Parcel Sembako</h4>
              <p>Parcel</p>
              <a href="assets/product/PARCELSEMBAKO.jpeg" data-gall="portfolioGallery" class="venobox preview-link" title="Parcel Sembako"><i class="bx bx-plus"></i></a>
              
            </div>
          </div>


           <!-- parcel -->
          

        </div>

      </div>
    </section>

  <section id="about" class="about mt-4">
      <div class="container">

        <h4 style="text-align: center;" class="mb-4">Abaout</h4>
        <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <div class="row">
          <div class="col-lg-6">
            <img src="{{url('assets/about.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

</div>







@endsection