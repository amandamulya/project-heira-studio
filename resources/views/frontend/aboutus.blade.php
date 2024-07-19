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
            <h3>About Us</h3>
            <p>Heira Studio merupakan studio fotografi yang sudah berjalan 1 tahun lamanya untuk mengabadikan momen-momen penting baik untuk keperluan pribadi maupun keperluan perusahaan. 
            Heira Studio adalah salah satu bisnis dari Heira House yang berlokasi di jl. Raya Pagongan no.11, Bakulan, Pepedan, kec. Talang, Kab.Tegal. </p>
            <h3>Vision</h3>
            <p>Asian Pacific region leader in studio photography</p>
            <h3>Mission</h3>
            <p>We need(s) to be better</p>
            <h3>Follow Us</h3>
            <p><i class="fa fa-instagram" aria-hidden="true"></i> heirastudio</p>
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush