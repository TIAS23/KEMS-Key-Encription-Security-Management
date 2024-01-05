@extends("admin.engineer.main")

@section("content")
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">
                        <a href="{{ route('gkuncis.index') }}">Kunci</a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">
                        <a href="{{ route('kuncis.generateCodeGK', ['gkuncis' => $gkuncis]) }}">Generate Code</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Generate Code</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('gkuncis.verifyCode') }}" method="post">
                                @csrf
                                
                                <p class="mb-0">Kode yang dihasilkan :</p>
                                <h4 class="font-weight-bold">{{ $generateCodeGK }}</h4>
                                
                                <div id="qrcode"></div>
                                
                                <br>
                            
                                <div class="mt-3">
                                    <a href="{{ route('gkuncis.index') }}" class="btn btn-secondary">Save</a>
                                </div>
                            </form>
                        </div>
                        
                        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                        <script>
                            var qrcode = new QRCode(document.getElementById("qrcode"), {
                                text: "{{ $generateCodeGK }}",
                                width: 128,
                                height: 128,
                                colorDark: "#000000",
                                colorLight: "#ffffff",
                                correctLevel: QRCode.CorrectLevel.H
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection