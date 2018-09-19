function send_message(){
    $.ajax({
        type : "POST",
        async: false,
        url : url.sendMessage,
        dataType: 'json',
        data : $('#chat_form').serialize(),
        success : function(json) {
            if(json.success == 1) {
                console.log('Message sent successfully');
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
        } 
    });
}

$('form#chat_form input').keypress(function(e){
    e.defaultPrevented;
    if(e.which == 13) {
        send_message();

        return false;
    }
});