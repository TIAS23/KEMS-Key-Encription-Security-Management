@extends("admin.engineer.main")

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
                            <a href="{{ route('engineers.index') }}">Order Key</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Approval Order Key</h2>
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
                                                <th>Image</th>
                                                <th>Approval Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Loop through the data and populate the table --}}
                                            @foreach($mitras as $mitra)
                                                <tr>
                                                    <td>{{ $mitra->id }}</td>
                                                    <td>{{ $mitra->created_at }}</td>
                                                    <td>{{ $mitra->nama_perusahaan_mitra }}</td>
                                                    <td>{{ $mitra->nama_petugas }}</td>
                                                    <td>{{ $mitra->pekerjaan }}</td>
                                                    <td>
                                                        @if($mitra->sentrals)
                                                            {{ $mitra->sentrals->sentrals_id }}
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

                                                    <td class="text">
                                                        {{-- Form for approval --}}
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('engineer.approve', ['mitra' => $mitra]) }}" method="POST">
                                                            @csrf
                                                            <select name="approve" class="form-control">
                                                                <option value="pending" {{ $mitra->approve == 'pending' ? 'selected' : '' }} class="{{ $mitra->approve == 'pending' ? 'bg-warning text-dark' : '' }}">Pending</option>
                                                                <option value="approved" {{ $mitra->approve == 'approved' ? 'selected' : '' }} class="{{ $mitra->approve == 'approved' ? 'bg-success text-white' : '' }}">Approved</option>
                                                                <option value="rejected" {{ $mitra->approve == 'rejected' ? 'selected' : '' }} class="{{ $mitra->approve == 'rejected' ? 'bg-danger text-white' : '' }}">Rejected</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Submit</button>
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
