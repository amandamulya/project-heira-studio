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
										<div class="card-title">Daftar Pesanan Pelanggan</div>
										<div class="card-tools">
											<!-- <a href="{{url('/pesanan/create')}}" class="btn btn-success btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Tambah Data
											</a> -->
											
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                        <table class="table table-bordered" id="tablepegawai">
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Nama Paket</th>
                                                    
                                                    <th>Nama Pelanggan</th>
                                                    <th>Tgl. Pesan</th>
                                                    <th>Tgl.dan Waktu Acara</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($index as $row)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td> {{ $row->id }} </td> 
                                                    <td> {{ $row->paket->nama_paket }} </td> 
                                                    <td> {{ $row->customer->nama }} </td> 
                                                    <td> {{ $row->tgl_pesan }} </td>
                                                    <td> {{ $row->tgl_acara }} {{$row->jam_acara}} WIB </td>
                                                    <td> 
                                                        @if($row->status == "baru") 
                                                        <span class="badge bg-warning">Baru</span>
                                                        @elseif($row->status == "dp sesuai")
                                                        <span class="badge bg-info">DP Sesuai</span>
                                                        @elseif($row->status == "lunas")
                                                        <span class="badge bg-primary">Lunas</span>
                                                        @else
                                                        <span class="badge bg-success">Selesai</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="/pesanan/{{ $row->id }}/edit" title="Ubah Data" class="btn btn-sm btn-info">
                                                            <i class="fa fa-edit"></i> Ubah
                                                        </a>
                                                        <form method="POST" action="{{ route('pesanan.destroy', $row->id) }}" style="display: inline-block;">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' onclick="confirm('apakah yakin akan menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>

                                            
                                        </table>
                                    </div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
			
		</div>
		@endsection

        @push('js')
        <script>
            $(document).ready(function() {
                $('#tablepegawai').DataTable({});
            });    
        </script>
        @endpush