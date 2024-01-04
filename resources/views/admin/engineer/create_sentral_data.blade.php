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
                        <a href="{{ route('sentrals.index') }}">Sentral</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambahkan Data Sentral</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sentrals.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="city" class="font-weight-bold">CITY</label>
                                    <input type="text" class="form-control @error('CITY') is-invalid @enderror" name="CITY" value="{{ old('CITY') }}" placeholder="Masukkan Nama Kota">
                                    @error('CITY')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="site_id" class="font-weight-bold">SITE_ID</label>
                                    <input type="text" class="form-control @error('SITE_ID') is-invalid @enderror" name="SITE_ID" value="{{ old('SITE_ID') }}" placeholder="Masukkan Nama Site ID">
                                    @error('SITE_ID')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="INFRA_SYS_ID" class="font-weight-bold">INFRA_SYS_ID</label>
                                    <input type="text" class="form-control @error('INFRA_SYS_ID') is-invalid @enderror" name="INFRA_SYS_ID" value="{{ old('INFRA_SYS_ID') }}" placeholder="Masukkan Nama INFRA_SYS_ID">
                                    @error('INFRA_SYS_ID')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="SITE_OWNER_ID" class="font-weight-bold">SITE_OWNER_ID</label>
                                    <input type="text" class="form-control @error('SITE_OWNER_ID') is-invalid @enderror" name="SITE_OWNER_ID" value="{{ old('SITE_OWNER_ID') }}" placeholder="Masukkan Nama SITE_OWNER_ID">
                                    @error('SITE_OWNER_ID')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="INFRA_TYPE" class="font-weight-bold">INFRA_TYPE</label>
                                    <input type="text" class="form-control @error('INFRA_TYPE') is-invalid @enderror" name="SITE_OWNER_ID" value="{{ old('INFRA_TYPE') }}" placeholder="Masukkan Nama INFRA_TYPE">
                                    @error('INFRA_TYPE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="INFRA_SUB_TYPE" class="font-weight-bold">INFRA_SUB_TYPE</label>
                                    <input type="text" class="form-control @error('INFRA_SUB_TYPE') is-invalid @enderror" name="INFRA_SUB_TYPE" value="{{ old('INFRA_SUB_TYPE') }}" placeholder="Masukkan Nama INFRA_SUB_TYPE">
                                    @error('INFRA_SUB_TYPE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ADDRESS" class="font-weight-bold">ADDRESS</label>
                                    <input type="text" class="form-control @error('ADDRESS') is-invalid @enderror" name="ADDRESS" value="{{ old('ADDRESS') }}" placeholder="Masukkan Nama ADDRESS">
                                    @error('ADDRESS')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="LATITUDE" class="font-weight-bold">ADDRESS</label>
                                    <input type="text" class="form-control @error('LATITUDE') is-invalid @enderror" name="LATITUDE" value="{{ old('LATITUDE') }}" placeholder="Masukkan Nama LATITUDE">
                                    @error('LATITUDE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="LONGITUDE" class="font-weight-bold">LONGITUDE</label>
                                    <input type="text" class="form-control @error('LONGITUDE') is-invalid @enderror" name="LONGITUDE" value="{{ old('LATITUDE') }}" placeholder="Masukkan Nama LONGITUDE">
                                    @error('LONGITUDE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
