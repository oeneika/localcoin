
/**
 * Events
 */

$('#id_price').on('keyup change',function(e){
    $('#id_quantity').val($(this).val()/btc_current_price);
});

$('#id_quantity').on('keyup change',function(e){
    $('#id_price').val(btc_current_price*$(this).val());
});