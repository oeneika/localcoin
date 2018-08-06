function openModalSell(){
    console.log('log');
    $('#createSellModal').modal('show');
}

/**
 * Ajax call
 */
function storeSell(){
    $.ajax({
        type : "POST",
        async: false,
        url : url.storeSell,
        dataType: 'json',
        data : $('#store_sell_form').serialize(),
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
$('#store_sell_btn').click(function(e){
    e.defaultPrevented;
    storeSell();
});

$('form#store_sell_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        storeSell();

        return false;
    }
});