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
            <center><h1 class="inder-regular mb-5">Pesanan <span class="lilita-one-regular">Saya</span></h1></center>
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @error('gambar')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
    </div>
            @enderror
            <table class="table table-bordered" style="background:none;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pesan</th>
                        <th>Nama Paket</th>
                        <th>Tgl. Pesan</th>
                        <th>Tgl. Acara</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($pesanan as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->paket->nama_paket}}</td>
                            <td>{{date('d/m/Y',strtotime($row->created_at))}}</td>
                            <td>{{date('d/m/Y',strtotime($row->tgl_acara))}}</td>
                            <td>{{date('H:i',strtotime($row->jam_acara))}}</td>
                            <td>
                                @if($row->status == 'baru')
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tfModal{{$row->id}}">
                                    Transfer
                                </button>

                                @endif

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{$row->id}}">
                                    Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="tfModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Transfer Pesanan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/memberpesanantf" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <p>Silahkan transfer dengan keterangan di bawah ini :
                                            <table class="table" style="font-size:11pt;">
                                                <tr>
                                                    <td width="15%">Bank</td>
                                                    <td width="45%">: BCA</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Nama Rekening</td>
                                                    <td width="45%">: Heira Studio</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Nomor Rekening</td>
                                                    <td width="45%">: 7765451776</td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Harga Paket</td>
                                                    <td width="45%">: Rp {{number_format($row->paket->harga)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="2">jika pembayaran dengan DP, min transfer 50% dari harga paket</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Minimal DP</td>
                                                    <td width="45%">: Rp {{number_format($row->paket->harga *0.5)}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Jml. Transfer  <span class="text-danger">*)</span></td>
                                                    <td width="45%"><input type="number" name="totalbayar" id="totalbayar" class="form-control" placeholder="Masukkan Jumlah Transfer" required></td>
                                                </tr>
                                            </table>

                                            
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label> Upload Bukti Transfer <span class="text-danger">*)</span></label><br>
                                                    <input type="file" name="gambar" id="gambar" class="form-control" required>

                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Kirim Bukti</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>




                                <!-- Modal -->
                                <div class="modal fade" id="detailModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <p>Silahkan transfer dengan keterangan di bawah ini :
                                            <table class="table" style="font-size:11pt;">
                                                <tr>
                                                    <td width="15%">Bank</td>
                                                    <td width="45%">: BCA</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Nama Rekening</td>
                                                    <td width="45%">: Heira Studio</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Nomor Rekening</td>
                                                    <td width="45%">: 7765451776</td>
                                                </tr>

                                                <tr>
                                                    <td width="15%">Harga Paket</td>
                                                    <td width="45%">: Rp {{number_format($row->paket->harga)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="2">jika pembayaran dengan DP, min transfer 50% dari harga paket</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Minimal DP</td>
                                                    <td width="45%">: Rp {{number_format($row->paket->harga *0.5)}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="15%">Jml. Transfer</td>
                                                    <td width="45%">Rp {{number_format($row->total_bayar)}}</td>
                                                </tr>
                                            </table>

                                            
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label> Bukti Transfer</label>

                                                    @if($row->bukti_bayar != null)
                                                        <img src="{{url('buktitf/'.$row->bukti_bayar)}}" class="img-fluid">
                                                    @endif

                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>    
@endsection

@push('js')
@endpush