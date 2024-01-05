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
                                            <th>ID Kunci</th>
                                            <th>ID Generate Code</th>
                                            <th>ID Sentral</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($gkuncis as $gkunci)
                                        <tr>
                                            <td>{{ $gkunci->kuncis_id }}</td>
                                            <td>
                                                @if($gkunci->kunci)
                                                    {{ $gkunci->kunci->generateCode ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($gkunci->sentrals)
                                                    {{ $gkunci->sentrals->SITE_ID ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="text">
                                                <a href="{{ route('gkuncis.edit_gkuncis', ['gkuncis' => $gkunci]) }}" class="btn btn-dark" style="border-radius: 10px;">Edit</a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('gkuncis.destroy', $gkunci->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" style="border-radius: 10px;" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                                <a href="{{ route('kuncis.generateCodeGK', ['gkuncis' => $gkunci]) }}" class="btn btn-secondary" style="border-radius: 10px;">Generate Code</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Post belum Tersedia.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                @if(session()->has('success'))
                    toastr.success('{{ session('success') }}', 'BERHASIL!'); 
                @elseif(session()->has('error'))
                    toastr.error('{{ session('error') }}', 'GAGAL!'); 
                @endif
            </script>
        </div>
    </div>
</div>
@endsection
