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
                            <a href="{{ route('gkuncis.index') }}">Kunci Detail</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('gkuncis.create_gkuncis') }}" class="btn btn-md btn-success mb-3">Tambahkan Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Kunci</th>
                                                <th>ID Generate Code</th>
                                                <th>ID Sentral</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Loop through the data and populate the table --}}
                                            @foreach($gkuncis as $gkunci)
                                                <tr>
                                                    <td>{{ $gkunci->id }}</td>
                                                    <td>{{ $gkunci->kuncis_id }}</td>
                                                    <td>
                                                        @if($gkunci->kunci)
                                                            {{ $gkunci->kunci->generateCode }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    
                                                    <td>
                                                        @if($gkunci->mitras) <!-- Check if $gkunci->mitras is not null -->
                                                            @if($gkunci->mitras->sentrals) <!-- Check if $gkunci->mitras->sentrals is not null -->
                                                                {{ $gkunci->mitras->sentrals->sentrals_id ?? 'N/A' }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        @else
                                                            N/A
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
