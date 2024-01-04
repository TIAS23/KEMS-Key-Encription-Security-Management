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
                            <a href="{{ route('sentrals.create_sentral_data') }}" class="btn btn-md btn-success mb-3">Tambahkan Data Sentral</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CITY</th>
                                            <th>SITE_ID</th>
                                            <th>INFRA_SYS_ID</th>
                                            <th>SITE_OWNER_ID</th>
                                            <th>INFRA_TYPE</th>
                                            <th>INFRA_SUB_TYPE </th>
                                            <th>ADDRESS </th>
                                            <th>LATITUDE</th>
                                            <th>LONGITUDE </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sentrals as $sentral)
                                            <tr>
                                                <td>{{ $sentral->sentrals_id }}</td>
                                                <td>{{ $sentral->CITY }}</td>
                                                <td>{{ $sentral->SITE_ID }}</td>
                                                <td>{{ $sentral->INFRA_SYS_ID }}</td>
                                                <td>{{ $sentral->SITE_OWNER_ID }}</td>
                                                <td>{{ $sentral->INFRA_TYPE }}</td>
                                                <td>{{ $sentral->INFRA_SUB_TYPE }}</td>
                                                <td>{{ $sentral->ADDRESS }}</td>
                                                <td>{{ $sentral->LATITUDE }}</td>
                                                <td>{{ $sentral->LONGITUDE }}</td>
                                                <td>
                                                    <a href="{{ route('sentrals.show', ['id' => $sentral->id]) }}" class="btn btn-primary" style="border-radius: 10px;">View</a>
                                                    <a href="{{ route('sentrals.edit', ['id' => $sentral->id]) }}"  class="btn btn-info" style="border-radius: 10px;">Edit</a>
                                                    <form action="{{ route('sentrals.destroy', ['id' => $sentral->id]) }}" method="POST" style="display: inline-block;">
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