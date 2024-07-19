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
            <center><h3 class="inder-regular mb-4">Ubah Profil</h3></center>
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @error('gambar')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <form action="{{url('member/profilsave')}}" method="post">
                @csrf
                <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label>Nama Lengkap</label><br>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{Auth::user()->nama}}" required>
                </div>
                <div class="form-group mt-3">
                    <label>Email</label><br>
                    <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" required>
                </div>

                <div class="form-group mt-3">
                    <label>No. HP</label><br>
                    <input type="text" name="hp" id="hp" class="form-control" value="{{Auth::user()->hp}}" required>
                </div>

                <div class="form-group mt-3">
                    <label>Tgl Lahir</label><br>
                    <input type="date" name="tgllahir" id="tgllahir" class="form-control" value="{{$query->tgl_lahir}}" required>
                </div>

                <div class="form-group mt-3">
                    <label>Jenkel</label><br>
                    <input type="radio" name="jenkel" id="jenkel" value="L" required @if($query->gender == "L") checked="checked" @endif> Laki-Laki&nbsp;
                    <input type="radio" name="jenkel" id="jenkel" value="P" required @if($query->gender == "P") checked="checked" @endif> Perempuan&nbsp;
                </div>

                <div class="form-group mt-3">
                    <label>Alamat Lengkap</label><br>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{$query->alamat}}" required>
                </div>

                <div class="form-group mt-3">
                    <label>Kode Pos</label><br>
                    <input type="text" name="kodepos" id="kodepos" class="form-control" value="{{$query->kode_pos}}" required>
                </div>

                <div class="form-group mt-3">
                    <label>Password</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                    <button type="submit" name="submit" class="btn btn-success mt-3">Simpan Profil</button>
            </form>
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush