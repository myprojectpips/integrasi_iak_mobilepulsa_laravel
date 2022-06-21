@extends('index')
@section('title', __('Integration Laravel - Mobilepulsa | Pulsa'))

@section('content')
<div class="container-fluid">
    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            <strong>Message!</strong> {{ $msg }}
        </div>
    @elseif($msg = Session::get('failed'))
        <div class="alert alert-warning">
            <strong>Message!</strong> {{ $msg }}
        </div>
    @elseif($msg = Session::get('process'))
        <div class="alert alert-warning">
            <strong>Message!</strong> {{ $msg }}
        </div>
    @elseif($msg = Session::get('error'))
        <div class="alert alert-danger">
            <strong>Message!</strong> {{ $msg }}
        </div>
    @endif

    <div class="col-sm-5 mx-auto m-3">
        <span>*Inputan ini akan mengecek otomatis nomor tujuan!</span>
        <br>
        <span>*Pastikan anda terhubung dengan koneksi internet!</span>
        <input type="text" class="form-control mb-3" placeholder="Nomor HP Tujuan..." id="no_telp">
        <span class="text-error text-danger"></span>
    </div>

    <div class="row container justify-content-center mx-auto" id="productList"></div>
</div>
@endsection

@section('script')
    <script src="{{ asset('asset/js/pulsa.js') }}"></script>
    <script>
        // Price card looping
        function elementProduct(noTelp, codeP, descriptionP, priceP) {
            const element = $('#productList').append('<div class="card mx-auto col-sm-3 ms-3 me-3 mt-3 mb-3 shadow-sm">\
                                                        <div class="card-body">\
                                                            <h3>'+ descriptionP +'</h3>\
                                                            <hr>\
                                                            <h3>'+ priceP +'</h3>\
                                                            <form action="{{ route("pulsa.pay") }}" method="POST">\
                                                                @csrf()\
                                                                <input type="text" name="prod_desc" class="noTelp" value="'+ descriptionP +'" hidden readonly>\
                                                                <input type="text" name="noTelp" class="noTelp" value="'+ noTelp +'" hidden readonly>\
                                                                <input type="text" name="prod_code" class="prod_code" value="'+ codeP +'" hidden readonly>\
                                                                <button class="btn btn-primary w-100" id="pay-btn">Beli</button>\
                                                            </form>\
                                                        </div>\
                                                    </div>');
            return element;
        }
    </script>
@endsection

@section('modal')
    
@endsection