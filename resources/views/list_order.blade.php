@extends('layouts/app')

@section('title','list order')



@section('content')


  

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<body>

<div id="app">

    <div class="container">
      <div class="card">
        <div class="card-header">
          Trace Order
        </div>
        <div class="card-body">
          <h5 class="card-title">Trace Order {{session('name_buyer')}} </h5>

          <table id="order" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                       <th>Order Id</th>
                      <th>Kode Product</th>
                      <th>Kategori</th>
                      <th>Buyer</th>
                      <th>Delivery Date</th>
                      <th>Order Status</th>


                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1 ?>
                  @foreach($list_order as $data)
                  <tr>
                      <td>{{$data->order_id}}</td>
                      <td>{{$data->kode_product}}</td>
                      <td>{{$data->kategori}}</td>
                      <td>{{$data->name_buyer}}</td>
                      <td>{{$data->tgl_kirim}}</td>
                      <td><a href="#" class="btn btn-primary">{{$data->status}}</a></td>
                     <!--  <td>{{$data->qty}}</td> -->
                  </tr>
                  @endforeach
                  
              </tbody>
              <tfoot>
                  <tr>
                       <th>Order Id</th>
                      <th>Kode Product</th>
                      <th>Kategori</th>
                      <th>Buyer</th>
                      <th>Delivery Date</th>
                      <th>Order Status</th>
                  </tr>
              </tfoot>
          </table>
          
        </div>
      </div>
    </div>

</div>




<!-- script vue js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    $('#order').DataTable();
} );
</script>

<script>
  const vm = new Vue({
    el: "#app",
    data: function(){
      return{
        gambar: '',
        preview: '',
        

      }
    },

    methods: {
      
      cek : function(){
        
        
      },


    }
  })
</script>

</body>
</html>

@include('sweetalert::alert')
@endsection