@extends('index')
@section('title', __('Integration Laravel - Mobilepulsa | Check Status'))

@section('content')
<div class="container-fluid">
    <div class="mx-auto m-3 col-sm-5">
        <span>*Inputan ini akan mengecek otomatis nomor tujuan!</span>
        <br>
        <span>*Pastikan anda terhubung dengan koneksi internet!</span>
        <input type="text" id="refId" class="form-control mb-3" placeholder="Masukkan Ref Id...">
        <span class="text-error text-danger"></span>
    </div>

    <div class="container" id="status"></div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            checkStatus();
        });

        function cardStatus(refId, customerId, productCode, price, tr_id, status, sn) {
            $('#status').append('<div class="card mx-auto col-sm-3 shadow">\
                                <div class="card-body">\
                                    <div class="w-100">\
                                        <p class="badge bg-info text-end">'+ status +'</p>\
                                        <h6>Ref ID : '+ refId +'</h6>\
                                    </div>\
                                    <hr>\
                                    <span>Price : '+ rupiah(price) +'</span> <br>\
                                    <span>Nomor Tujuan : '+ customerId +'</span> <br>\
                                    <span>Product Code : '+ productCode +'</span> <br>\
                                    <span>Transaksi ID : '+ tr_id +'</span> <br>\
                                    <span>Status : '+ status +'</span> <br>\
                                    <span>SN : '+ sn +'</span> <br>\
                                </div>\
                            </div>');
        }

        function checkStatus() {
            $('#refId').on('keyup', function () {
                let ref_id = $('#refId').val();

                $.ajax({
                    type: "POST",
                    url: "/check-status/get-status",
                    data: {ref_id : ref_id},
                    dataType: "json",
                    success: function (res) {
                        $('#status').html("");

                        if (res.rc == 00 || res.rc == 07 || res.rc == 39) {
                            cardStatus(res.ref_id, res.customer_id, res.product_code, res.price, res.tr_id, res.message, res.sn);
                            $('.text-error').text("");
                        }else{
                            $('.text-error').text("Error : "+res.message);
                        }
                    }
                });
            });
        }
    </script>
@endsection

@section('modal')
    
@endsection