@extends('layout')
@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  <div class="container table" style="margin-top: 95px;">
    <div class="container table" style="margin-left: 95px;">
    <div class="count row text-center justify-content-center"> 
        <div class="col-md-3">   
            <div class="card" style="width: 18rem;">
                <div class="card-body" style="background-color:  rgba(255, 72, 72, 0.768)">
                    <h2 class="card-title">Data Makanan</h2>
                    <p class="card-text">Jumlah </p>
                    <h4>{{$shop->where('retdate', '=', null)->count()}}</h4>

                </div>
            </div> 
        </div>
        <div class="col-md-4">   
            <div class="card" style="width: 18rem;">
                <div class="card-body" style="background-color:  rgba(255, 72, 72, 0.768)">
                    <h2 class="card-title">Data Makanan</h2>
                    <p class="card-text">Jumlah</p>
                    <h4>{{$shop->where('retdate', '!=', null)->count()}}</h4>

                </div>
            </div> 
        </div>
    </div>
   </div>
  {{-- end jumlah --}}
<div style="margin-top: 50px">
  <div style="margin-left: 65px">
  <div style="margin-right: 65px">

<table class="table justify-content-center">
    <thead style="background-color: rgba(255, 72, 72, 0.768)">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">Ket</th>
        <th scope="col">Photo</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($shop   as $number => $laptop)
        <tr>
        <td>{{$laptop['name']}}</td>
        <td>{{$laptop['barang']}}</td>
        <td>{{$laptop['harga']}}</td>
        <td>{{$laptop['ket']}}</td>
        <td> <img src="{{asset('assets/image/' . $laptop->foto)}}" width="200" alt=""></td>

          <td>
          <button class="bg-transparent" style="border: none" ><a href="{{route('delete', $laptop->id)}}" style="color: rgb(229, 83, 83)"><i class="fa-solid fa-trash"></i></a></button>
          <button class="bg-transparent ms-2" style="border: none"  data-bs-toggle="modal" data-bs-target="#edit{{$laptop->id}}"><a href="/edit/{{$laptop->id}}"> <i class="fas fa-marker" style="color: rgb(95, 0, 0)"></i></a></button>

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
