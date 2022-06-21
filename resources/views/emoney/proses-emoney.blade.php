@extends('index')
@section('title', __('Integration Laravel - Mobilepulsa | Proses E-Money'))

@section('content')
<div class="container-fluid">
    <div class="row container">
        {{-- untuk mengambil data dari url --}}
        <span id="type" hidden>{{ $type }}</span>

        @if ($msg = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ $msg }}
            </div>
        @elseif($msg = Session::get('failed'))
            <div class="alert alert-warning">
                <strong>Failed!</strong> {{ $msg }}
            </div>
        @elseif($msg = Session::get('process'))
            <div class="alert alert-info">
                <strong>Process!</strong> {{ $msg }}
            </div>
        @elseif($msg = Session::get('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $msg }}
            </div>
        @endif

        <div class="justify-content-center col-sm-5 mx-auto mb-5">
            <span>*Masukkan nomor tujuan ewallet terlebih dahulu sebelum membeli</span>
            <input type="text" id="noTelp" class="form-control" placeholder="Masukkan No Telp...">
            <span class="text-error text-danger"></span>
        </div>

        <div class="row container justify-content-center mx-auto" id="emoneyCard"></div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('asset/js/emoney.js') }}"></script>
    
    <script>
        // Price card untuk di looping
        function emoneyCard(productCode, productDesc, productNominal, productPrice) {
            $('#emoneyCard').append('\<div class="card col-sm-3 m-2 border border-info p-0">\
                                        <div class="card-body">\
                                            <h3>'+productDesc+'</h3>\
                                            <hr>\
                                            <span>Nominal : '+productNominal+'</span>\
                                            <br>\
                                            <span>Harga : '+rupiah(productPrice)+'</span>\
                                        </div>\
                                        <div class="card-footer">\
                                            <form action="/pulsa/pay" method="POST">\
                                                @csrf\
                                                <input type="text" name="prod_desc" value="'+productDesc+'" hidden readonly>\
                                                <input type="text" name="noTelp" class="numberVal" hidden readonly>\
                                                <input type="text" name="prod_code" value="'+productCode+'" hidden readonly>\
                                                <button class="btn btn-primary w-100 btnBeli disabled">Beli</button>\
                                            </form>\
                                        </div>\
                                    </div>');
        }
    </script>
@endsection

@section('modal')
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
            Modal body..
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
    
        </div>
        </div>
    </div>
@endsection