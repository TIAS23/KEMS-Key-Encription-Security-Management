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
                        <a href="{{ route('mitras.index') }}">Mitra</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mitras.edit', ['mitra' => $mitra]) }}">Edit Mitra</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Mitra</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mitras.update', ['mitra' => $mitra->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

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
                                    <textarea class="form-control @error('pekerjaan') is-invalid @enderror"
                                        name="pekerjaan" rows="5" placeholder="Masukkan Pekerjaan">{{ $mitra->pekerjaan }}</textarea>
                                    @error('pekerjaan')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="id_sentral" class="font-weight-bold">Sentral</label>
                                    <select class="form-control @error('id_sentral') is-invalid @enderror" name="id_sentral" required>
                                        <option value="" selected disabled>Pilih Sentral</option>
                                        @foreach ($sentrals as $sentral)
                                            <option value="{{ $sentral->id }}" {{ $mitra->id == $sentral->id ? 'selected' : '' }}>
                                                {{ $sentral->sentrals_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_sentral')
                                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="image" class="font-weight-bold">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <a href="{{ route('mitras.index') }}" class="btn btn-md btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
