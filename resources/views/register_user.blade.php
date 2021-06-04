@extends('layouts/app')

@section('title','Register')



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
  width: 70%;
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

<form id="regForm" method="post" action="{{url('ebunga/creat-register')}}" enctype="multipart/form-data">
	 @csrf
  <h1 class="mb-5"><strong>NEW MEMBER REGISTRATION </strong></h1>
 
  <!-- One "tab" for each step in the form: -->

  
  

  	<div class="form-group">
      
	    <label style="font-weight: bold;">Full Name <i>/ Nama Lengkap (required)</i></label>
	    <input type="text" name="full_name" class="form-control" placeholder="Enter full name">
	</div>

  <!-- <div class="form-group">
      
      <label style="font-weight: bold;">No.Telp <i> (required)</i></label>
      <input type="text" name="no_telp" class="form-control" placeholder="Enter number phone">
  </div> -->

	 
 	  <div class="form-group">
	    <label style="font-weight: bold;">Email (required)</label>
	    <input type="email" class="form-control" placeholder="Enter email" required="" name="email">
 	 </div>

 	  <div class="form-group">
	    <label style="font-weight: bold;">Password <i>/ Password (required)</i></label>
	    <input type="password" v-model="password" class="form-control" placeholder="Enter password" name="password" minlength="8">
 	 </div>


 	  <div class="form-group">
	    <label style="font-weight: bold;">Repeat Password <i>/ Ulangi Password (required)</i></label>
	    <input type="password" v-model="password1" class="form-control" placeholder="Enter repeat password" name="password1" minlength="8">
 	 </div>

   <p v-if="password === ''" v-text="pesan" style="color: red"></p>
    <p v-if="password !== password1" style="color: red">Password belum sama</p>
  

  <div style="overflow:auto;">
    <div style="">
      <center>
        <input type="submit" class="btn btn-success" name="kirim" value="REGISTER / DAFTAR">
      </center>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  
</form>


</div>





</body>
</html>

@include('sweetalert::alert')
@endsection