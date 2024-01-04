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
                            <a href="{{ route('kode.index') }}">Code Detail</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Code Detail</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal Pembuatan </th>
                                                <th>Key Combinations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Loop through the data and populate the table --}}
                                            @foreach($kuncis as $kunci)
                                                <tr>
                                                    <td>{{ $kunci->id }}</td>
                                                    <td>{{ $kunci->created_at }}</td>
                                                    <td>{{ $kunci->generateCode }}</td>
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
