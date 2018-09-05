function openModalBuy(){
    $('#createBuyModal').modal('show');
}

/**
 * Ajax call
 */
function storeBuy(){
    $('#store_buy_btn').attr('disabled','disabled');
    $.ajax({
        type : "POST",
        async: false,
        url : url.storeBuy,
        dataType: 'json',
        data : $('#store_buy_form').serialize(),
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
            $('#store_buy_btn').removeAttr('disabled');
        } 
    });
}

/**
 * Events
 */
$('#store_buy_btn').click(function(e){
    e.defaultPrevented;
    storeBuy();
});

$('form#store_buy_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        storeBuy();

        return false;
    }
});