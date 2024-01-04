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
                            <a href="{{ route('transactions.index') }}">Transaction Detail</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Transactions</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Waktu Pengajuan</th>
                                                <th>ID User</th>
                                                <th>ID Kunci</th>
                                                <th>ID Sentral</th>
                                                <th>ID Pengajuan</th>
                                                <th>Key Combinations</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Loop through the data and populate the table --}}
                                            @foreach($mitras as $mitra)
                                                <tr>
                                                    <td>{{ $mitra->id }}</td>
                                                    <td>{{ $mitra->created_at }}</td>
                                                    <td>
                                                        @if($mitra->user)
                                                            {{ $mitra->user->users_id ?? 'N/A' }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($mitra->gkuncis)
                                                            {{ $mitra->gkuncis->kuncis_id ?? 'N/A' }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>                                                        
                                                    <td>
                                                        @if($mitra->sentrals)
                                                            {{ $mitra->sentrals->sentrals_id ?? 'N/A' }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $mitra->mitras_id }}</td>

                                                    <td>
                                                        @if($mitra->kunci)
                                                            {{ $mitra->kunci->generateCode ?? 'N/A' }}
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
