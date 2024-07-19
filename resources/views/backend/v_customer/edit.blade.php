@extends('backend.v_layouts.app')
@section('title', 'Pelanggan')
@section('main')
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
                                <div class="card-title">Form Ubah Customer</div>
                                <div class="card-tools">
                                    <a href="{{url('/customer')}}" class="btn btn-danger btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                            <i class="fa fa-reply"></i>
                                        </span>
                                        Batalkan
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <form action="{{route('customer.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="userid" value="{{$edit->user_id}}">
                        <div class="card-body">
                            
                            @if(Session::has('pesanerror'))
                                <div class="alert alert-danger">{{Session::get('pesanerror')}}</div>
                            @endif

                            <div class="form-group">
                            
                                <label for="nama">Nama Customer</label>
                                
                                <input type="text" name="nama" id="nama" value="{{ $edit->user->nama }}" class="form-control @error('nama') is-invalid @enderror" />
                                @error('nama')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="email">Email</label>
                                
                                <input type="email" name="email" id="email" value="{{ $edit->user->email }}" class="form-control @error('email') is-invalid @enderror" />
                                @error('email')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="tgllahir">Tanggal Lahir</label>
                                
                                <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $edit->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror" />
                                @error('tgl_lahir')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="alamat">Alamat</label>
                                
                                <input type="text" name="alamat" id="alamat" value="{{ $edit->alamat }}" class="form-control @error('alamat') is-invalid @enderror" />
                                @error('alamat')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="kodepos">Kodepos</label>
                                
                                <input type="text" name="kode_pos" id="kode_pos" value="{{ $edit->kode_pos }}" class="form-control @error('kode_pos') is-invalid @enderror" />
                                @error('kode_pos')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="hp">No. HP</label>
                                
                                <input type="text" name="hp" id="hp" value="{{ $edit->user->hp }}" class="form-control @error('hp') is-invalid @enderror" />
                                @error('hp')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="jenkel">Jenkel</label><br>
                                
                                <input type="radio" name="gender" id="gender" value="L" @if($edit->gender=="L") checked @endif/>&nbsp;<span class="badge bg-info text-white"> Laki-Laki</span>&nbsp;
                                <input type="radio" name="gender" id="gender" value="P" @if($edit->gender=="P") checked @endif/>&nbsp;<span class="badge bg-danger text-white"> Perempuan</span>&nbsp;
                                @error('gender')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="status">Status</label><br>
                                
                                <input type="radio" name="status" id="status" value="1" @if($edit->user->status=="1") checked @endif/>&nbsp;<span class="badge bg-success text-white"> Aktif</span>&nbsp;
                                <input type="radio" name="status" id="status" value="0" @if($edit->user->status=="0") checked @endif/>&nbsp;<span class="badge bg-danger text-white"> Tidak Aktif</span>&nbsp;
                                @error('status')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            
                                <label for="password">Password</label>
                                
                                <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" />
                                @error('password')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
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