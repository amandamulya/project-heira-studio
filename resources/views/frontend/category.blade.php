@extends('layout.member')
@push('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inder&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inder&family=Lilita+One&display=swap" rel="stylesheet">
<style>
    .inder-regular {
  font-family: "Inder", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.lilita-one-regular {
  font-family: "Lilita One", sans-serif;
  font-weight: 400;
  font-style: normal;
}



</style>
@endpush

@section('main')
<!-- Begin page content -->
 <div class="container mt-2">
    <div class="p-5 mb-4 rounded-3">
        <div class="container-fluid py-5 text-success">
            <center><h3 class="inder-regular mb-4">Pilihan Kategori</h3></center>
            <div class="row">
                @foreach($kategori as $kat)
                    <div class="col-4 text-center" onclick="javascript:window.location.href='{{url('categorydetail/'.$kat->id)}}'">
                        <img src="{{url('fotokategori/'.$kat->foto)}}" width="250" class="rounded">
                        <h4 class="lilita-one-regular mt-3">{{$kat->nama_kategori}}</h4>
                        <p class="inder-regular">{{$kat->deskripsi}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush