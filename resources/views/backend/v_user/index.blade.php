@extends('backend.v_layouts.app')
@section('title', 'Home')
@section('main')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Pengguna</h4>
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
										<div class="card-title">Daftar Data Pengguna</div>
										<div class="card-tools">
											<a href="{{url('/user/create')}}" class="btn btn-success btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-plus"></i>
												</span>
												Tambah Data
											</a>
											
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                        <table class="table table-bordered" id="tablepegawai">
                                        <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Email</th>
                                                    <th>Nama</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($index as $row)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td> {{ $row->email }} </td>
                                                    <td> {{ $row->nama }} </td>
                                                    <td>
                                                        @if ($row->role == 1)
                                                        <span class="label label-success"></i>
                                                            Super Admin</span>
                                                        @elseif($row->role == 0)
                                                        <span class="label label-info"></i>
                                                            Admin</span>
                                                        @elseif($row->role == 2)
                                                        <span class="label label-warning"></i>
                                                        Customer</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($row->status ==1)
                                                        <span class="label label-success"></i>
                                                            Aktif</span>
                                                        @elseif($row->status ==0)
                                                        <span class="label label-default"></i>
                                                            NonAktif</span>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/user/{{ $row->id }}/edit" title="Ubah Data" class="btn btn-sm btn-info">
                                                            <i class="fa fa-edit"></i> Ubah
                                                        </a>
                                                        <form method="POST" action="{{ route('user.destroy', $row->id) }}" style="display: inline-block;">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="button" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' data-konf-delete="{{ $row->nama }}"><i class="fa fa-trash"></i> Hapus</button></button>
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