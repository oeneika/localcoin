function showRankModal(id,rank){
    $('#user_id').val(id);
    $('#rank').val(rank).change();
    $('#rankModal').modal('show');
}

/**
 * Ajax call
 */
function storeBankAccount(){
    $.ajax({
        type : "POST",
        url : url.rankUser,
        dataType: 'json',
        data : $('#rank_form').serialize(),
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
$('#rankBtn').click(function(e){
    e.defaultPrevented;
    storeBankAccount();
});

$('form#rank_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        storeBankAccount();

        return false;
    }
});