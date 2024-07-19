@extends('backend.v_layouts.app')
@section('title', 'Pelanggan')
@section('main')
<style>
    label {
        font-weight:bolder;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{$judul}}</h4>
                <div class="btn-group btn-group-page-header ml-auto">
                    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="arrow"></div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Form Proses Pesanan</div>
                                <div class="card-tools">
                                    <a href="{{url('/pesanan')}}" class="btn btn-danger btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                            <i class="fa fa-reply"></i>
                                        </span>
                                        Batalkan
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <form action="{{route('pesanan.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            
                            @if(Session::has('pesanerror'))
                                <div class="alert alert-danger">{{Session::get('pesanerror')}}</div>
                            @endif

                            <div class="form-group">
                            
                                <label for="idorder">ID. Order</label><br>
                                <b>{{$edit->id}}</b>
                            </div>

                            <div class="form-group">
                            
                                <label for="nama">Nama Lengkap</label><br>
                                <b>{{$edit->customer->nama}}</b>
                            </div>

                            <div class="form-group">
                            
                                <label for="tgllahir">Alamat</label><br>
                               <b>{{$edit->customer->alamat}}</b> 
                            </div>

                            <div class="form-group">
                            
                                <label for="alamat">No. HP</label><br>
                                <b>{{$edit->customer->hp}}</b>
                            </div>

                            <div class="form-group">
                            
                                <label for="kodepos">Jumlah Transaksi</label><br>
                                <b>{{number_format($edit->total_bayar)}}</b>
                            </div>

                            <div class="form-group">
                            
                                <label for="hp">Bukti Transfer</label><br>
                                @if($edit->bukti_bayar != null)
                                    <img src="{{url('buktitf/'.$edit->bukti_bayar)}}" width="250" class="img-fluid">
                                @endif
                                
                            </div>

                            <div class="form-group">
                            
                                <label for="jenkel">Status</label><br>
                                <select name="status" class="form-control @error('status') is-invalid @enderror col-3">
                                    <option value="baru" @if($edit->status=="baru") selected @endif>Baru</option>
                                    <option value="dp sesuai" @if($edit->status=="dp sesuai") selected @endif>DP Sesuai</option>
                                    <option value="lunas"  @if($edit->status=="lunas") selected @endif>Lunas</option>
                                    <option value="selesai" @if($edit->status=="selesai") selected @endif>Selesai</option>
                                    
                                </select>
                            </div>

                            <h3>Detail Pesanan</h3>
                            <div class="form-group">
                            
                                <label for="status">Tgl Acara</label><br>
                                
                                <b>{{date('d/m/Y',strtotime($edit->tgl_acara))}}</b>
                            </div>

                            <div class="form-group">
                            
                                <label for="password">Jam Acara</label><br>
                                
                                <b>{{date('H:i',strtotime($edit->jam_acara))}} WIB</b>
                            </div>

                            <div class="form-group">
                            
                                <label for="hp">Nama Paket</label><br>
                                <b>{{$edit->paket->nama_paket}}</b>
                                
                            </div>

                            <div class="form-group">
                            
                                <label for="hp">Harga Paket</label><br>
                                <b>{{number_format($edit->paket->harga)}}</b>
                                
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-rounded btn-login">Simpan Data</button>
                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
</div>
@endsection

@push('js')

@endpush