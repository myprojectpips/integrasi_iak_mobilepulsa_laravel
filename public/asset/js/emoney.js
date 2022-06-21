$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getData();
});

// Mengisi otomatis pada inputan yang berulang
// Dan disable jik inputan kosong
$('#noTelp').on('keyup', function () {
    let no_telp = $('#noTelp').val();

    if (no_telp == "") {
        $('.btnBeli').addClass('disabled');
    }else{
        $('.btnBeli').removeClass('disabled');
    }
    
    $('.numberVal').val(no_telp);
});

// Mengambil data
function getData() {
    let tipe = $('#type').text();

    $.ajax({
        type: "POST",
        url: "/emoney/get",
        dataType: "json",
        success: function (res) {
            $('#emoneyCard').html("");
            $.each(res.data.pricelist, function (key, val) { 
                if (val.product_type == "etoll" && val.status == "active") {
                    if (tipe.toUpperCase() == "DANA" && val.product_description.toUpperCase() == "DANA") {
                        emoneyCard(val.product_code, val.product_description, val.product_nominal, val.product_price);
                    }else if (tipe.toUpperCase() == "OVO" && val.product_description.toUpperCase() == "OVO") {
                        emoneyCard(val.product_code, val.product_description, val.product_nominal, val.product_price);
                    }else if (tipe.toUpperCase() == "SHOPEE-PAY" && val.product_description.toUpperCase() == "SHOPEE PAY") {
                        emoneyCard(val.product_code, val.product_description, val.product_nominal, val.product_price);
                    }else if (tipe.toUpperCase() == "GOPAY" && val.product_description.toUpperCase() == "GOPAY E-MONEY") {
                        emoneyCard(val.product_code, val.product_description, val.product_nominal, val.product_price);
                    }else if (tipe.toUpperCase() == "LINKAJA" && val.product_description.toUpperCase() == "LINKAJA") {
                        emoneyCard(val.product_code, val.product_description, val.product_nominal, val.product_price);
                    }
                }
            });
        }
    });
}