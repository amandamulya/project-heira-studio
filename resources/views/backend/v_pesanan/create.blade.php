<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/pesanan" method="post">
        @csrf

        <label>Nama</label><br>
        <input type="text" name="nama" id="" placeholder="Masukkan Nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
        <span class="invalid-feedback alert-danger" role="alert">
            {{$message}}
        </span>
        @enderror
        <p></p>

        <label>HP</label><br>
        <input type="text" name="hp" id="" placeholder="Masukkan HP" value="{{ old('hp') }}" class="form-control @error('hp') is-invalid @enderror">
        @error('hp')
        <span class="invalid-feedback alert-danger" role="alert">
            {{$message}}
        </span>
        @enderror
        <p></p>

    <label>Alamat</label><br>
        <input type="text" name="alamat" id="" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
        @error('alamat')
        <span class="invalid-feedback alert-danger" role="alert">
            {{$message}}
        </span>
        @enderror
        <p></p>

        <label for="tgl_pesan">Tanggal Pesan</label><br>
<input type="date" name="tgl_pesan" id="tgl_pesan" value="{{ old('tgl_pesan') }}" class="form-control @error('tgl_pesan') is-invalid @enderror">
@error('Tanggal Pesan')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
@enderror
<p></p>

<label for="tgl_acara">Tanggal Acara</label><br>
<input type="date" name="tgl_acara" id="tgl_acara" value="{{ old('tgl_acara') }}" class="form-control @error('tgl_acara') is-invalid @enderror">
@error('Tanggal Acara')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
@enderror
<p></p>

<label for="jam_acara">Jam Acara</label><br>
<input type="time" name="jam_acara" id="jam_acara" value="{{ old('jam_acara') }}" class="form-control @error('jam_acara') is-invalid @enderror">
@error('jam_acara')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
@enderror
<p></p>

{{--
<label for="id_paket">Pilih Paket</label><br>
<select name="id_paket" id="id_paket" class="form-control @error('id_paket') is-invalid @enderror">
    <option value="">Pilih Paket</option>
    @foreach($paket as $p)
        <option value="{{ $p->id }}" {{ old('id_paket') == $p->id ? 'selected' : '' }}>{{ $p->nama_paket }}</option>
    @endforeach
</select>
@error('id_paket')
    <span class="invalid-feedback alert-danger" role="alert">
        {{$message}}
    </span>
@enderror
<p></p>
--}}
        
        <button type="submit">Simpan</button>

    </form>
</body>
</html>