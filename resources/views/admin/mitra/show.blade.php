<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Mitra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: lightgray;
        }
        .card {
            border: 2px solid #3498db;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            color: #333;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Add your details here -->
                        <h4 class="mb-4">DETAIL PENGAJUAN</h4>
                        <div class="mb-3">
                            <strong>Nama Perusahaan Mitra:</strong> {{ $mitra->nama_perusahaan_mitra }}
                        </div>
                        <div class="mb-3">
                            <strong>Nama Petugas:</strong> {{ $mitra->nama_petugas }}
                        </div>
                        <div class="mb-3">
                            <strong>Pekerjaan:</strong> {{ $mitra->pekerjaan }}
                        </div>
                        <div class="mb-3">
                            <strong>ID Sentral:</strong> {{ $mitra->sentrals->sentrals_id }}
                        </div>
                        <div class="mb-3">
                            @if($mitra->image)
                                <img src="{{ asset('storage/posts/' . basename($mitra->image)) }}" class="img-fluid rounded" alt="Image" style="max-width: 100%">
                            @else
                                <span>No Image</span>
                            @endif
                        </div>
                        <a href="{{ route('mitras.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
