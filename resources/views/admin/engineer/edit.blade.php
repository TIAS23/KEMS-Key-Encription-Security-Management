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
                                    <label for="city" class="font-weight-bold">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" value="{$sentral->city }}" placeholder="Masukkan Nama Kota">
                                    @error('city')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="site_id" class="font-weight-bold">Site ID</label>
                                    <input type="text" class="form-control @error('site_id') is-invalid @enderror"
                                        name="site_id" value="{{ $sentral->site_id }}" placeholder="Masukkan Nama Site ID">
                                    @error('site_id')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="infra_sys_id" class="font-weight-bold">Infra SYS ID</label>
                                    <input type="text" class="form-control" @error('infra_sys_id') is-invalid @enderror"
                                        name="infra_sys_id" value="{{ $sentral->infra_sys_id }}" placeholder="Masukkan Infra SYS ID">                                    @error('infra_sys_id')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="site_owner" class="font-weight-bold">Site Owner</label>
                                    <input type="text" class="form-control" @error('site_owner') is-invalid @enderror"
                                        name="site_owner" value="{{ $sentral->site_owner }}" placeholder="Masukkan Site Owner">                                    @error('site_owner')
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
