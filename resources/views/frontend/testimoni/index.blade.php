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
            <center><h3 class="inder-regular mb-4">Testimoni Pelanggan</h3><h4 class="lilita-one-regular">What Thy Said</h4>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#testiModal">
                                    Buat Testimoni
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="testiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tulis Testimonial</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/member/testimonisave" method="post">
                                            @csrf
                                        <div class="row">
                                           
                                            <div class="col-12">
                                                
                                            <div class="form-group">
                                                <label>Isi Testimoni Anda</label><br>
                                                <textarea class="form-control" rows="4" cols="45" placeholder="Tulis Testimoni" name="isi" reqired></textarea>
                                            </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
            </center>
            <div class="row">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
                @foreach($query as $kat)
                    <div class="alert bg-success mt-5 text-white">
                        <h4 class="lilita-one-regular mt-3">{{$kat->user->nama}}<br><small>{{$kat->user->email}}</small></h4>
                        <p class="inder-regular">{{$kat->isi_testimoni}}</p>
                        <small class="text-warning">Diposting pada {{date('d/m/Y H:i:s')}} WIB</small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush