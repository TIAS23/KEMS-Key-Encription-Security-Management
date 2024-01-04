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
                            <h4 class="card-title">Tambahkan Pengajuan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mitras.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                
                                <div class="form-group">
                                    <label for="nama_perusahaan_mitra" class="font-weight-bold">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="nama_perusahaan_mitra" value="{{ $nama_perusahaan_mitra }}" placeholder="Masukkan Nama Perusahaan" readonly>
                                    <!-- Adding the 'readonly' attribute to make it non-editable -->
                                </div>


                                <div class="form-group">
                                    <label for="nama_petugas" class="font-weight-bold">Nama Petugas</label>
                                    <input type="text" class="form-control" name="nama_petugas" value="{{ auth()->user()->name }}" placeholder="Masukkan Nama Petugas" readonly>
                                    <!-- Adding the 'readonly' attribute to make it non-editable -->
                                </div>

                
                                <div class="form-group">
                                    <label for="pekerjaan" class="font-weight-bold">Pekerjaan</label>
                                    <textarea class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" rows="5" placeholder="Masukkan Pekerjaan">{{ old('pekerjaan') }}</textarea>
                                    @error('pekerjaan')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="id_sentral" class="font-weight-bold">Sentral</label>
                                    <select class="form-control @error('id_sentral') is-invalid @enderror" name="id_sentral" required>
                                        <option value="" selected disabled>Pilih Sentral</option>
                                        @foreach ($sentrals as $sentral)
                                            <option value="{{ $sentral->id }}" {{ old('id') == $sentral->id ? 'selected' : '' }}>
                                                {{ $sentral->SITE_ID }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_sentral')
                                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kuncis_id" class="font-weight-bold">Kunci</label>
                                    <select class="form-control @error('kuncis_id') is-invalid @enderror" name="kuncis_id" required>
                                        <option value="" selected disabled>Pilih Kunci</option>
                                        
                                        @foreach ($gkuncis as $gkunci)
                                            <option value="{{ $gkunci->id }}" {{ old('kuncis_id') == $gkunci->id ? 'selected' : '' }}>
                                                {{ $gkunci->kuncis_id }}
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                
                                    @error('kuncis_id')
                                        <div class="invalid-feedback mt-2">{{ $message }}</div>
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
