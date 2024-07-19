@extends('layout.member')
@push('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inder&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inder&family=Lilita+One&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fascinate+Inline&display=swap" rel="stylesheet">
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

.fascinate-inline-regular {
        font-family: "Fascinate Inline", system-ui;
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
            <center><h1 class="inder-regular mb-5">Pilihan Paket <span class="lilita-one-regular">{{$kategori->nama_kategori}}</span></h1></center>
            
            @php
                $no = 1;
                @endphp
                @foreach($paket as $pak)
                
                    @php
                    $no++;
                    $modno = $no%2;
                    @endphp

                    @if($modno == 0)
                        <div class="row">
                            <div class="col-4 text-center">
                                <img src="{{url('fotopaket/'.$pak->foto)}}" width="250" class="rounded">
                            </div>
                            <div class="col-8">
                                <h4 class="fascinate-inline-regular">{{$pak->nama_paket}}</h4>
                                <p class="inder-regular"><b>Harga : Rp {{number_format($pak->harga)}}</b></p>
                                <p class="inder-regular"><b>Deskripsi : </b></p>
                                {{$pak->detail}}<br>

                                @if(!Auth::user())
                                
                                <a href="{{url('loginmember')}}" class="btn btn-light btn-sm mt-3">
                                    Login untuk order
                                </a>
                                @else
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{$pak->id}}">
                                    Order Sekarang
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="orderModal{{$pak->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Booking {{$pak->nama_paket}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/simpanpesanan" method="post">
                                            @csrf
                                            <input type="hidden" name="paketid" value="{{$pak->id}}">
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <img src="{{url('fotopaket/'.$pak->foto)}}" class="img-fluid img-responsive rounded">
                                            </div>
                                            <div class="col-8">
                                                <p class="inder-regular"><b>Harga : Rp {{number_format($pak->harga)}}</b>
                                                <br><b>Deskripsi : </b>
                                                {{$pak->detail}}<br></p>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tanggal <span class="text-danger">*)</span></label><br>
                                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Waktu <span class="text-danger">*)</span></label><br>
                                                    <input type="time" name="waktu" id="waktu" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Pesan Paket</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @else
                    <div class="row">
                             <div class="col-8">
                                <h4 class="fascinate-inline-regular">{{$pak->nama_paket}}</h4>
                                <p class="inder-regular"><b>Harga :</b> Rp {{number_format($pak->harga)}}</p>
                                <p class="inder-regular"><b>Deskripsi : </b></p>
                                {{$pak->detail}}
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{url('fotopaket/'.$pak->foto)}}" width="250" class="rounded">
                            </div>
                            
                        </div>
                    @endif

                @endforeach
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush