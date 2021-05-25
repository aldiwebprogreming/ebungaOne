@extends('layouts/app')

@section('title','Register Seller')



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

<form id="regForm" method="post" action="{{url('daftar')}}" enctype="multipart/form-data">
	 @csrf
  <h1><strong>Sign Up Your User Account</strong></h1>
  <p style="text-align: center;">Fill all form field to go to next step</p>
  <!-- One "tab" for each step in the form: -->

  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
   
  </div>
  <div class="tab">
  	<h3 class="mb-4" style="">Acount</h3>

  	<div class="form-group">
	    <label style="font-weight: bold;">Handphone Number <i>/ Nomor HP (required)</i></label>
	    <input type="number" name="nohp" class="form-control" placeholder="Enter handphone number">
	</div>

	 <div class="form-group">
	    <label style="font-weight: bold;">Full Name <i>/ Nama Lengkap (required)</i></label>
	    <input type="text" class="form-control" placeholder="Enter full name" name="full_name">
 	 </div>

 	  <div class="form-group">
	    <label style="font-weight: bold;">Email (required)</label>
	    <input type="email" class="form-control" placeholder="Enter email" required="" name="email">
 	 </div>

 	  <div class="form-group">
	    <label style="font-weight: bold;">Password <i>/ Password (required)</i></label>
	    <input type="password" class="form-control" placeholder="Enter password" name="password">
 	 </div>


 	  <div class="form-group">
	    <label style="font-weight: bold;">Repeat Password <i>/ Ulangi Password (required)</i></label>
	    <input type="password" class="form-control" placeholder="Enter repeat password" name="password1">
 	 </div>

<!-- 								 	 
    <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p> -->
  </div>


  <div class="tab">
  	<h3 class="mb-4" style="">Zone</h3>

  	<div class="row">
  		<div class="col-sm-6">
        	<div class="form-group">
			    <label style="font-weight: bold;">Country <i>/ Negara *</i></label>
			  	<select class="form-control" name="negara">
			  		<option>Indonesia</option>
			  	</select>
	 		 </div>
    	</div>
		<div class="col-sm-6">
        	<div class="form-group">
			    <label style="font-weight: bold;">Province <i>/ Provinsi *</i></label>
			  <select class="form-control" name="provinsi" id="prov">
			  		@foreach($prov as $data)
			  		<option value="{{$data->id_prov}}" id="prov">{{$data->nama}}</option>
			  		@endforeach
			  	</select>
	 		 </div>
    	</div>

    	<div class="col-sm-6">
        	<div class="form-group">
			    <label style="font-weight: bold;">Regency <i>/ Kabupaten *</i></label>
			  <select id="kabupaten" class="form-control" name="kabupaten">
			  		<option></option>
			  	</select>
	 		 </div>
    	</div>

    	<div class="col-sm-6">
        	<div class="form-group">
			    <label style="font-weight: bold;">Districts <i>/ Kecamatan *</i></label>
			   <select id="kecamatan" class="form-control" name="kecamatan">
			  		<option></option>
			  	</select>
	 		 </div>
    	</div>
	</div>

  <!--   <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p> -->
 </div>



  <div class="tab">
  	<h3 class="mb-4" style="">Zone</h3>

  	 <div class="form-group">
	    <label  style="font-weight: bold;">KTP <i>/ ID Card (required)</i></label>
	    <input type="file" v-on:change="upload" class="form-control" placeholder="Enter file" name="ktp" id="ktp">
      <p><img :src="preview" v-if="preview" style="height: 100px; margin-top: 30px; "></p>
        <button  v-on:click="deleteimg" v-if="preview" class="badge badge-primary">Delete file</button>
	 </div>

	 <div class="form-group">
	    <label style="font-weight: bold;">Npwp (required)</i></label>
	    <input type="file" v-on:change="uploadNpwp" class="form-control" placeholder="Enter file" name="npwp" id="npwp">
       <p><img :src="previewNpwp" v-if="previewNpwp" style="height: 100px; margin-top: 30px; "></p>
        <button  v-on:click="deleteimgNpwp" v-if="previewNpwp" class="badge badge-primary">Delete file</button>
	 </div>


	 <div class="form-group">
	    <label style="font-size: 12px; font-weight: bold;">SIUP / KK (*Upload with KK if does not have a SIUP / Upload dengan KK apabila tidak memiliki SIUP)ed)</i></label>
	    <input type="file" v-on:change="uploadKK" class="form-control" placeholder="Enter file" name="siup" id="kk">
      <p><img :src="previewKK" v-if="previewKK" style="height: 100px; margin-top: 30px; "></p>
        <button  v-on:click="deleteimgKK" v-if="previewKK" class="badge badge-primary">Delete file</button>
	 </div>
   <!--  <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p> -->
  </div>
 
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  
</form>


</div>



<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$("#prov").change(function(){
  		var id_prov = $(this).val();
  		var url = "<?= url('getkabupaten')  ?>/"+id_prov;
  		  $("#kabupaten").load(url);
		});

    $("#kabupaten").change(function(){
      var id_kab = $(this).val();
      var urlKab = "<?= url('getkecamatan')  ?>/"+id_kab;
        $("#kecamatan").load(urlKab);
    })

	})
</script>

<!-- script vue js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<script>
  const vm = new Vue({
    el: "#app",
    data: function(){
      return{
        gambar: '',
        preview: '',
        gambarNpwp: '',
        previewNpwp: '',
        gambarKK: '',
        previewKK: ''
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
        $("#ktp").val('')
      },

      uploadNpwp :function(){
         var namagambarNpwp = event.target.files[0].name
        this.gambarNpwp = namagambarNpwp
        this.previewNpwp = URL.createObjectURL(event.target.files[0])
      },

      deleteimgNpwp: function(){
        this.previewNpwp = ''
        $("#npwp").val('')
      },

      uploadKK :function(){
         var namagambarKK = event.target.files[0].name
        this.gambarKK = namagambarKK
        this.previewKK = URL.createObjectURL(event.target.files[0])
      },

      deleteimgKK: function(){
        this.previewKK = ''
        $("#kk").val('')
      }

    }
  })
</script>

</body>
</html>

	
@endsection