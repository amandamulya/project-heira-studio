@extends('layout.member')
@push('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fascinate+Inline&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fascinate+Inline&family=Inika:wght@400;700&display=swap" rel="stylesheet">
<style>
    .fascinate-inline-regular {
        font-family: "Fascinate Inline", system-ui;
        font-weight: 400;
        font-style: normal;
        }

        .inika-regular {
        font-family: "Inika", serif;
        font-weight: 400;
        font-style: normal;
        }

        .inika-bold {
        font-family: "Inika", serif;
        font-weight: 700;
        font-style: normal;
        }

</style>
@endpush

@section('main')
<!-- Begin page content -->
 <div class="container mt-5">
    <div class="p-5 mb-4 rounded-3">
        <div class="container-fluid py-5 text-success">
            <img src="{{asset('theme/img/bear.png')}}" align="left" style="max-width:300px;">
            <h1 class="display-5 fw-bold fascinate-inline-regular">Hi, Dear</h1>
            <h2 class="col-md-8 fs-4 inika-bold">Welcome to</h2>
            <h1 class="display-5 fw-bold fascinate-inline-regular">Heira Studio</h1>
            <p>Capture your moments with us, where creativity meets professionalism. Our state-of-the-art studio offers a variety of services, including portrait photography, event coverage, and commercial shoots. </p>
            <p>Book your session today and let us bring your vision to life!</p>
            <button class="btn btn-primary btn-lg mt-1" type="button"><i class="fa fa-check"></i> Pesan Sekarang</button>
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush