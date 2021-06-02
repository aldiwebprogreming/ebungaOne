
  <div id="app2">
    
    @foreach($kel as $data)
    <input v-model='val' type="checkbox" name="zona" value="{{$data->nama}}"><label>{{$data->nama}}</label><br>
    @endforeach

    <p v-text='val'></p>

  </div>


<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
  const vm = new Vue({
    el : "#app2",
    data : {
      nama : 'aldi',
      val: [],
    }
  })
</script>
