@extends('layouts/app')
@section('title','card')

@section('css')
<style>
  /* Style the form */
#regForm {
  background-color: #ffffff;

 
  width: 70%;
  min-width: 300px;
}

/* Style the input fields */
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

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>

@endsection

@section('content')

	<div class="container">
		<section id="contact" class="contact">
      <div class="container">
	     <div class="row">	     	

          <div class="col-lg-5 d-flign-items-stretch">
            <div class="info">
            	<center>
             <img src="{{ url('assets')}}/{{$detail->images}}">
             <hr>
             <img src="{{ url('assets')}}/{{$detail->images}}" style="height: 70px; border: 3px solid green;">
              <img src="{{ url('assets')}}/{{$detail->images}}" style="height: 70px; border: 3px solid green;">
             <img src="{{ url('assets')}}/{{$detail->images}}" style="height: 70px; border: 3px solid green;">
             </center>
            </div>

          </div>

          <div class="col-lg-7 mt-2 mt-lg-0 d-flex align-items-stretch">

            <form id="regForm" action="{{$detail->slug_product}}/{{'detail2'}}" method="POST">
               @csrf

               <input type="hidden" name="image" class="form-control" value="{{$detail->images}}">

               <input type="hidden" name="harga" class="form-control" value="{{$detail->harga}}">

                <input type="hidden" name="nama_product" class="form-control" value="{{$detail->nama_product}}">

                <input type="hidden" name="kel" class="form-control" value="{{$detail->kelurahan}}">

                <input type="hidden" name="kec" class="form-control" value="{{$detail->kecamatan}}">

                <input type="hidden" name="kab" class="form-control" value="{{$detail->kabupaten}}">

                <input type="hidden" name="prov" class="form-control" value="{{$detail->provinsi}}">

              <div class="label mb-4">
                <h3>{{$detail->nama_product}}</h3>
                <span>{{$detail->keterangan}}</span>
                <p class="mt-3">
                    <i class="far fa-heart" style="color: red"></i>
                    <i class="far fa-heart" style="color: red"></i>
                    <i class="far fa-heart" style="color: red"></i>
                  <i class="far fa-heart" style="color: red"></i>
                  <span style="font-weight: bold;">| 44 Terjual</span>
                </p>

                <hr>
              </div>

            
              <!-- stap 1 -->
              <div class="tab">
                <h3 style="color: orange;">Stap 1</h3>
                <hr>
                <div class="row mb-3">

                  <div class="col-md-6">
                     <label>Jumlah</label>
                    <input type="number" oninput="this.className= ''" class="form-control" min="1" name="jumlah">
                  </div>
                 <div class="col-md-6">
                   <label>Tgl Kirim</label>
                    <input placeholder="{{$tgl}}"  name="" type="text" onfocus="(this.type='date')" id="date" oninput="this.className= ''" class="form-control" value="{{$tgl}}" name="tgl_kirim">
                  </div>

                  <div class="col-md-6 mt-3">
                    <label>Catatan</label>
                    <textarea class="form-control" oninput="this.className=''"  style="height: 100px;" name="catatan"></textarea>
                  </div>
                 <div class="col-md-6 mt-3">
                    <label>Tulisan pada papan bunga</label>
                    <textarea class="form-control" oninput="this.className=''" style="width: 200px; height: 100px;" name="note_papan_bunga"></textarea>
                  </div>



                </div>
              </div>
              <!-- edn stap 1 -->

              <!-- step 2 -->
              <div class="tab">
                    <h3 style="color: orange;">Stap 2</h3>
                    <hr>
                    <div class="stap2">
                    <label>Alamat Penerima</label>
                    <textarea oninput="this.className=''"  style="height: 100px; width: 100%" name="alamat_penerima"></textarea>
                    </div>

                    <div class="stap2 mt-3" >
                    <label>Nama Penerima</label>
                    <input type="text" name="nama_penerima" style="width: 100%;">
                    </div>

                    <div class="stap2 mt-3">
                    <label>Email Penerima</label>
                    <input type="email" name="email_penerima" style="width: 100%;">
                    </div>

                    <div class="stap2 mt-3 mb-3">
                    <label>Telp. Penerima</label>
                    <input type="number" name="telp_penerima" style="width: 100%;">
                    </div>
                
              </div>
            

                <div style="overflow:auto;">
                  <div style="float:right;">
                    <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1)">Next</button>
                  </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                  <!-- <span class="step"></span>
                  <span class="step"></span> -->
                </div>

            </form>
          </div>

        </div>

      </div>
    </section>
	</div>
	

	@endsection


  @section('js')
    <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "View Summary";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
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
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
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
      // and set the current valid status to false:
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
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
    </script>

@endsection

