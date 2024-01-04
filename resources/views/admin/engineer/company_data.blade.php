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
                        <a href="{{ route('company_data.index') }}">Sentral</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('company_data.create_company_data') }}" class="btn btn-md btn-success mb-3">Tambahkan Data Company</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name Company</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($company_data as $company)
                                            <tr>
                                                <td>{{ $company->id }}</td>
                                                <td>{{ $company->name_company }}</td>
                                                <td>
                                                    <a href="{{ route('company.edit_company', ['id' => $company->id]) }}"  class="btn btn-info" style="border-radius: 10px;">Edit</a>
                                                    <form action="{{ route('company.destroy', ['id' => $company->id]) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" style="border-radius: 10px;" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                    </form>
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