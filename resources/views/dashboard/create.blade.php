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

  <a href="/login">Login<a>
    
<div class="wrapper">
    <div class="title">
    Tambah Data
    </div>
    <div class="form">  
      <form action="/store" method="POST" enctype="multipart/form-data"> 
        @csrf  

        <div class="inputfield">
          <label>NAMA</label>
          <input type="text" class="input" name="name">
       </div>  
        
       <div class="inputfield">
        <label>Makanan</label>
        <input type="text" class="input" name="barang">
     </div>   

        <div class="inputfield">
          <label>Harga</label>  
          <div class="custom_select">
            <select name="harga">
              <option value="">Select</option>
              <option value="Rp.5.000,00">Rp.5.000,00</option>
              <option value="Rp.7.000,00">Rp.7.000,00</option>
              <option value="Rp.10.000,00">Rp.10.000,00</option>
              <option value="Rp.12.000,00">Rp.12.000,00</option>
              <option value="Rp.15.000,00">Rp.15.000,00</option>
              <option value="Rp.20.000,00">Rp.20.000,00</option>
              <option value="Rp.30.000,00">Rp.30.000,00</option>
            </select>
          </div>
       </div> 

      <div class="inputfield">
          <label>Keterangan</label>
          <textarea class="textarea" name="ket"></textarea>
       </div> 

       <div class="inputfield">
        <label>Foto</label>
        <input type="file" class="input" name="foto">
     </div>   


      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
          </label>
       </div> 
      <div class="inputfield">
        <input type="submit" value="submit" class="btn">
      </div>
    </form>
    </div>
</div>	
</body>
</html>
@endsection