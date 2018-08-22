function openModalEditBuy(id,price, currency, bank_account,quantity){
    $('#id_transaction').val(id);
    $('#edit_price').val(price) 
    $('#edit_quantity').val(quantity) 
    $('#edit_currency').val(currency).change();
    $('#edit_bank_account').val(bank_account).change();
    $('#editBuyModal').modal('show');
}

/**
 * Ajax call
 */
function updateBuy(){
    $('#update_buy_btn').attr('disabled','disabled');
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
        },
        complete: function(){ 
            $('#update_buy_btn').removeAttr('disabled');
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