@extends("admin.mitra.main")

@section("content")
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mitras.index') }}">Order Key</a>
                        </li>
                    </ul>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('mitras.create') }}" class="btn btn-md btn-success mb-3">Tambahkan Pengajuan</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Perusahaan Mitra</th>
                                                <th>Nama Mitra</th>
                                                <th>Pekerjaan</th>
                                                <th>Sentral</th>
                                                <th>Kunci</th>
                                                <th>Image</th>
                                                <th>Approval Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($mitras as $mitra)
                                                <tr>
                                                    <td>{{ $mitra->mitras_id }}</td>
                                                    <td>{{ $mitra->created_at }}</td>
                                                    <td>
                                                        @if($mitra->user && $mitra->user->company)
                                                            {{ $mitra->user->company->name_company }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($mitra->user)
                                                            {{ $mitra->user->name }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $mitra->pekerjaan }}</td>
                                                    <td>
                                                        @if($mitra->sentrals)
                                                            {{ $mitra->sentrals->sentrals_id }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($mitra->gkuncis)
                                                            {{ $mitra->gkuncis->kuncis_id }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td class="text-center">
                                                        @if($mitra->image)
                                                            <img src="{{ asset('storage/posts/' . basename($mitra->image)) }}" class="rounded" style="width: 100px">
                                                        @else
                                                            <span>No Image</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if($mitra->approve == 'approved')
                                                            <span class="badge badge-success">Approved</span>
                                                            <br>
                                                            @if(isset($mitra->kunci))
                                                                <span class="badge badge-dark">Key: {{ $mitra->kunci->generateCode }}</span>
                                                            @else
                                                                <span class="badge badge-dark">N/A</span>
                                                            @endif
                                                        @elseif($mitra->approve == 'rejected')
                                                            <span class="badge badge-danger">Rejected</span>
                                                        @else
                                                            <span class="badge badge-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                    

                                                    <td class="text">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mitras.destroy', $mitra->id) }}" method="POST">
                                                            <a href="{{ route('mitras.show', ['mitra' => $mitra]) }}" class="btn btn-primary" style="border-radius: 10px;">View</a>
                                                            <a href="{{ route('mitras.edit', ['mitra' => $mitra]) }}" class="btn btn-dark" style="border-radius: 10px;">Edit</a>
                                                            <a href="{{ route('kuncis.generateCode', ['mitra' => $mitra]) }}" class="btn btn-secondary" style="border-radius: 10px;">Generate Code</a>
                                                            <form action="{{ route('mitras.destroy', ['mitra' => $mitra]) }}" method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" style="border-radius: 10px;"  onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                            </form>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">Data Post belum Tersedia.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    //message with toastr
                    @if(session()->has('success'))
                        toastr.success('{{ session('success') }}', 'BERHASIL!'); 
                    @elseif(session()->has('error'))
                        toastr.error('{{ session('error') }}', 'GAGAL!'); 
                    @endif
                </script>
            </div>
        </div>
    </div>
@endsection
