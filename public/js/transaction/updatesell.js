function openModalEdit(id,price, currency, bank,payment_method){
    $('#id_transaction').val(id);
    $('#edit_price').val(price)
    $('#edit_currency').val(currency).change();
    $('#edit_bank').val(bank).change();
    $('#edit_payment_method').val(payment_method).change();
    $('#editSellModal').modal('show');
}

/**
 * Ajax call
 */
function updateSell(){
    $.ajax({
        type : "PUT",
        url : url.updateSell,
        dataType: 'json',
        data : $('#update_sell_form').serialize(),
        success : function(json) {
            if(json.success == 1) {
                setTimeout(function(){
                    toastr.success(json.message);
                    location.reload(true);
                },1000);
            } 
            else {
                json.errors.forEach(element => {
                    toastr.error(element); 
                });
            }
        },
        error : function(xhr, status) {
            toastr.error(status); 
        }
    });
}

/**
 * Events
 */
$('#update_sell_btn').click(function(e){
    e.defaultPrevented;
    updateSell();
});

$('form#update_sell_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        updateSell();

        return false;
    }
});