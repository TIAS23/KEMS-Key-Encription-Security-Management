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
                        <a href="{{ route('users.index') }}">User Management</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambahkan User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="font-weight-bold">Password</label>
                                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukkan Password">
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="font-weight-bold">Password Confirmation</label>
                                    <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Password">
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_id" class="font-weight-bold">Company</label>
                                    <select class="form-control @error('company_id') is-invalid @enderror" name="company_id" required>
                                        <option value="" selected disabled>Pilih Company</option>
                                        @foreach ($company_data as $company)
                                            <option value="{{ $company->id }}" {{ old('id') == $company->id ? 'selected' : '' }}>
                                                {{ $company->name_company }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="role" class="font-weight-bold">Role User</label>
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                        <option value="engineer" {{ old('role') == 'engineer' ? 'selected' : '' }}>Engineer</option>
                                        <option value="mitra" {{ old('role') == 'mitra' ? 'selected' : '' }}>Mitra</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                    @error('role')
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