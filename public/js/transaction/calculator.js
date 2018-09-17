$(document).ready(function(){
    $.ajax({
        type : "GET",
        dataType : "json",
        url : "https://api.coindesk.com/v1/bpi/currentprice/VEF.json",
        success : function(json){
            btc_current_price = json.bpi.VEF.rate_float/100000;
            console.log(btc_current_price);

            $('#id_price').removeAttr('disabled');
            $('#id_quantity').removeAttr('disabled');
        }
    })
})


/**
 * Events
 */

$('#id_price').on('keydown change',function(e){
    $('#id_quantity').val($(this).val()/btc_current_price);
});

$('#id_quantity').on('keydown change',function(e){
    $('#id_price').val(btc_current_price*$(this).val());
});