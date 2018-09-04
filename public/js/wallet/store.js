function openStoreWalletModal(){
    $('#createWalletModal').modal('show');
}

/**
 * Ajax call
 */
function storeWallet(){
    $.ajax({
        type : "POST",
        url : url.storeWallet,
        dataType: 'json',
        data : $('#store_wallet_form').serialize(),
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
$('#store_wallet_btn').click(function(e){
    e.defaultPrevented;
    storeWallet();
});

$('form#store_wallet_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        storeWallet();

        return false;
    }
});