function openModalEdit(id,price, currency, bank,payment_method){
    $('#id_transaction').val(id);
    $('#edit_price').val(price)
    $('#edit_currency').val(currency).change();
    $('#edit_bank').val(bank).change();
    $('#edit_payment_method').val(payment_method).change();
    $('#editBuyModal').modal('show');
}

/**
 * Ajax call
 */
function updateBuy(){
    $.ajax({
        type : "PUT",
        url : url.updateBuy,
        dataType: 'json',
        data : $('#update_buy_form').serialize(),
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
$('#update_buy_btn').click(function(e){
    e.defaultPrevented;
    updateBuy();
});

$('form#update_buy_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        updateBuy();

        return false;
    }
});