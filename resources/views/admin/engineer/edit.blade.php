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
                        <a href="{{ route('sentrals.index') }}">Order Key</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambahkan Pengajuan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sentrals.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                
                                <div class="form-group">
                                    <label for="CITY" class="font-weight-bold">City</label>
                                    <input type="text" class="form-control @error('CITY') is-invalid @enderror"
                                        name="CITY" value="{{$sentral->CITY }}" placeholder="Masukkan Nama Kota">
                                    @error('CITY')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="SITE_ID" class="font-weight-bold">Site ID</label>
                                    <input type="text" class="form-control @error('SITE_ID') is-invalid @enderror"
                                        name="SITE_ID" value="{{$sentral->SITE_ID}}" placeholder="Masukkan Nama Site ID">
                                    @error('SITE_ID')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="INFRA_SYS_ID" class="font-weight-bold">Infra SYS ID</label>
                                    <input type="text" class="form-control" @error('INFRA_SYS_ID') is-invalid @enderror"
                                        name="INFRA_SYS_ID" value="{{ $sentral->INFRA_SYS_ID }}" placeholder="Masukkan Infra SYS ID">                                    
                                        @error('INFRA_SYS_ID')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="SITE_OWNER_ID" class="font-weight-bold">Site Owner</label>
                                    <input type="text" class="form-control" @error('SITE_OWNER_ID') is-invalid @enderror"
                                        name="SITE_OWNER_ID" value="{{ $sentral->SITE_OWNER_ID }}" placeholder="Masukkan Site Owner">                                    
                                        @error('SITE_OWNER_ID')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="INFRA_TYPE" class="font-weight-bold">Infra Type</label>
                                    <input type="text" class="form-control" @error('INFRA_TYPE') is-invalid @enderror"
                                        name="INFRA_TYPE" value="{{ $sentral->INFRA_TYPE }}" placeholder="Masukkan Infra Type">                                    
                                        @error('INFRA_TYPE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="INFRA_SUB_TYPE" class="font-weight-bold">Infra Sub Type</label>
                                    <input type="text" class="form-control" @error('INFRA_SUB_TYPE') is-invalid @enderror"
                                        name="INFRA_SUB_TYPE" value="{{ $sentral->INFRA_SUB_TYPE }}" placeholder="Masukkan Infra Sub Type">                                    
                                        @error('INFRA_SUB_TYPE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ADDRESS" class="font-weight-bold">Addresss</label>
                                    <input type="text" class="form-control" @error('ADDRESS') is-invalid @enderror"
                                        name="ADDRESS" value="{{ $sentral->ADDRESS }}" placeholder="Masukkan Address">                                    
                                        @error('ADDRESS')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="LATITUDE" class="font-weight-bold">Latitude</label>
                                    <input type="text" class="form-control" @error('LATITUDE') is-invalid @enderror"
                                        name="LATITUDE" value="{{ $sentral->LATITUDE }}" placeholder="Masukkan Latitude">                                    
                                        @error('LATITUDE')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="LONGITUDE" class="font-weight-bold">Longitude</label>
                                    <input type="text" class="form-control" @error('LONGITUDE') is-invalid @enderror"
                                        name="LONGITUDE" value="{{ $sentral->LONGITUDE }}" placeholder="Masukkan Longitude">                                    
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
