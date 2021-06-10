@extends('layouts/app')

@section('title','Login Seller')



@section('content')


  

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 50%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button #nexBtn{
  display: none;
}


button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 50px;
  width: 50px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<body>

<div id="app">

<form id="regForm" method="post" action="{{url('cek/seller')}}">
  @csrf
  <h4 style="text-align: center;">Seller Sign In</h4>
  
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
        @error('email')
          <smal class="text-danger"> {{ $message }} </smal>
       @enderror
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
         @error('password')
          <smal class="text-danger"> {{ $message }} </smal>
       @enderror
      </div>

      <button type="submit" class="btn btn-success">SIGN IN</button>

      <a href="{{url('seller/register')}}" class="float-right">Register account seller ?</a>
       <a href="#" class="float-right">Forget Password ? , </a>
    
    
</form>


</div>




<!-- script vue js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

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