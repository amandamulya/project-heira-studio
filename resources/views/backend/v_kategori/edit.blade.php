@extends('backend.v_layouts.app')
@section('title', 'Kategori')
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
										<div class="card-title">Form ubah Kategori</div>
										<div class="card-tools">
											<a href="{{url('/kategori')}}" class="btn btn-danger btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-reply"></i>
												</span>
												Batalkan
											</a>
											
										</div>
									</div>
								</div>
                                <form action="{{route('kategori.update',$query->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
								<div class="card-body">
                                    @if(Session::has('pesanerror'))
                                        <div class="alert alert-danger">{{Session::get('pesanerror')}}</div>
                                    @endif

                                    <div class="form-group">
                                    
                                        <label for="nama">Nama Kategori</label>
                                        
                                        <input type="text" name="nama" id="nama" value="{{ $query->nama_kategori }}" class="form-control @error('nama') is-invalid @enderror" />
                                        @error('nama')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    
                                        <label for="deskripsi">Deskripsi Singkat</label>
                                        
                                        <input type="text" name="deskripsi" id="deskripsi" value="{{ $query->deskripsi }}" class="form-control @error('deskripsi') is-invalid @enderror" />
                                        @error('deskripsi')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    
                                        <label for="gambar">Pilih Gambar</label>
                                        
                                        <input type="file" name="gambar" id="gambar" value="{{ old('gambar') }}" class="form-control @error('gambar') is-invalid @enderror" />
                                        <small>File yang diijinkan PNG, JPG, JPEG. Ukuran File (max) : 5MB.</small>
                                        @error('gambar')
                                        <span class="invalid-feedback alert-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <br>
                                        <img src="{{url('fotokategori/'.$query->foto)}}" width="250" class="img-fluid img-rounded">
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