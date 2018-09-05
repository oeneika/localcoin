function openStoreAccountModal(){
    $('#createBankAccountModal').modal('show');
}

/**
 * Ajax call
 */
function storeBankAccount(){
    $.ajax({
        type : "POST",
        url : url.storeBankAccount,
        dataType: 'json',
        data : $('#store_bank_account_form').serialize(),
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
        }
    });
}

/**
 * Events
 */
$('#store_bank_account_btn').click(function(e){
    e.defaultPrevented;
    storeBankAccount();
});

$('form#store_bank_account_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        storeBankAccount();

        return false;
    }
});