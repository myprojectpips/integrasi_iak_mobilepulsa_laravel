$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    autoDetectOperator();
});

// Untuk menampilkan data price pulsa ketika nomor sesuai operator
function autoDetectOperator () {
    $('#no_telp').on('keyup', function () {
        let no_telps = $('#no_telp').val();
        
        $.ajax({
            type: "POST",
            url: "/pulsa/get-op",
            data:{no_telp : no_telps},
            dataType: "json",
            success: function (res) {
                if (res.code == 444) {
                    $('.text-error').text("Error : " + res.msg);
                }else{
                    $('#productList').html("");
                    $.each(res.dataPulsa, function (key, val) {
                        if (val.product_type == "pulsa" && val.status == "active") {
                            if (res.operator.toUpperCase() == "TELKOMSEL" && val.product_description.toUpperCase() == "TELKOMSEL") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }else if (res.operator.toUpperCase() == "THREE" && val.product_description.toUpperCase() == "THREE") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }else if (res.operator.toUpperCase() == "XL" && val.product_description.toUpperCase() == "XL") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }else if (res.operator.toUpperCase() == "AXIS" && val.product_description.toUpperCase() == "AXIS") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }else if (res.operator.toUpperCase() == "SMART" && val.product_description.toUpperCase() == "SMART") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }else if (res.operator.toUpperCase() == "INDOSAT" && val.product_description.toUpperCase() == "INDOSAT") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }else if (res.operator.toUpperCase() == "BY.U" && val.product_description.toUpperCase() == "BY.U") {
                                elementProduct(no_telps, val.product_code, val.product_description, rupiah(val.product_nominal));
                            }
                        }
                    });

                    $('.text-error').text("");
                }
            }
        });
    });
}