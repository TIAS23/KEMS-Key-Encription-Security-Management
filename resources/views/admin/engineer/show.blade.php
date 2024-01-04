<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Mitra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                         <!-- Add your details here -->
                         <h4>DETAIL DATA</h4>
                         <p><strong>City:</strong> {{ $sentral->city }}</p>
                         <p><strong>Site ID:</strong> {{ $sentral->site_id }}</p>
                         <p><strong>Infra SYS ID:</strong> {{ $sentral->infra_sys_id }}</p>
                         <p><strong>Site Owner:</strong>{{ $sentral->site_owner }}</p>
                         
                     <a href="{{ route('sentrals.index') }}" class="btn btn-primary">Back to List</a>
                 </div>
                 </div>
             </div>
         </div>
     </div>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
 </html>
 