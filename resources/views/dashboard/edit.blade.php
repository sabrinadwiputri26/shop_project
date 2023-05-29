@extends('layout')
@section('content')

  @if ($errors->any())
  <div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
    @endforeach  
  </ul>  
  </div>    

@endif 
  @csrf 
<div class="wrapper">
    <div class="title">
    Tambah Data
    </div>
    <div class="form">  
      <form action='/update/{{$data->id}}' method="POST" enctype="multipart/form-data">
        
        @csrf  
        @method('PATCH')
        <div class="inputfield">
          <label>NAMA</label>
          <input type="text" class="input" name="name" value="{{$data->name}}">
       </div>  
        
       <div class="inputfield">
        <label>Makanan</label>
        <input type="text" class="input" name="barang" value="{{$data->barang}}">
     </div>   

        <div class="inputfield">
          <label>Harga</label>  
          <div class="custom_select">
            <select name="harga" value="{{$data->harga}}">
              <option value="">Select</option>
              <option value="Rp.5.000,00" {{$data->harga == "Rp.5.000,00" ? "selected" : "" }}>Rp.5.000,00</option>
              <option value="Rp.7.000,00" {{$data->harga == "Rp.7.000,00" ? "selected" : "" }}>Rp.7.000,00</option>
              <option value="Rp.10.000,00" {{$data->harga == "Rp.10.000,00" ? "selected" : "" }}>Rp.10.000,00</option>
              <option value="Rp.12.000,00" {{$data->harga == "Rp.12.000,00" ? "selected" : "" }}>Rp.12.000,00</option>
              <option value="Rp.15.000,00" {{$data->harga == "Rp.15.000,00" ? "selected" : "" }}>Rp.15.000,00</option>
              <option value="Rp.20.000,00" {{$data->harga == "Rp.20.000,00" ? "selected" : "" }}>Rp.20.000,00</option>
              <option value="Rp.30.000,00" {{$data->harga == "Rp.30.000,00" ? "selected" : "" }}>Rp.30.000,00</option>
            </select>
          </div>
       </div> 

      <div class="inputfield">
          <label>Keterangan</label>
          <textarea class="textarea" name="ket" value="{{$data->ket}}"></textarea>
       </div> 

       <div class="inputfield">
        <label>Foto</label>
        <img src="{{asset('assets/image/' . $data->foto)}}" width="200" alt="">
       <input type="file" name="foto">
     </div> 


  
      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
          </label>
       </div> 
      <div class="inputfield">
        <button type="submit" value="submit" class="btn">save</button>
      </div>
    </form>
    </div>
</div>	
</body>
</html>
@endsection