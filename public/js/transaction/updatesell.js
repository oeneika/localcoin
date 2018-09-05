function openModalEditSell(id,price, currency, bank_account,quantity){
    $('#id_transaction').val(id);
    $('#edit_price').val(price); 
    $('#edit_quantity').val(quantity); 
    $('#edit_currency').val(currency).change();
    $('#edit_bank_account').val(bank_account).change();
    $('#editSellModal').modal('show');
}

/**
 * Ajax call
 */
function updateSell(){
    $('#update_sell_btn').attr('disabled','disabled');
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
                json.errors.forEach(function(element){
                    toastr.error(element); 
                });
            }
        },
        error : function(xhr, status) {
            toastr.error(status); 
        },
        complete: function(){ 
            $('#update_sell_btn').removeAttr('disabled');
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