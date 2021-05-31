		
		<hr>
		@foreach($kel as $data)

		<input v-model="val" type="checkbox" name="zona[]" value="{{$data->nama}}" ></label> {{$data->nama}} <br>
		<hr>


		@endforeach

		<p v-text='val'></p>

		<h3 v-text='nama'></h3>
	

		<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
  const vm = new Vue({
    el: "#kelurahan",
    data: function(){
      return{
        gambar: '',
       	nama: 'aldi',
       	list : false,
       	val : [],
        

      }
    },

    methods: {
      submit: function(event, id_kec){
         event.preventDefault()
      	var id = id_kec
      	var url = "<?= url('seller/listkelurahan/')  ?>/"+id;
        $("#kecamatan").load(url);       
      },

      

    }
  })
</script>





