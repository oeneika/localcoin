function send_message(){
    var form = $('#chat_form')[0];

    var data = new FormData(form)
    $.ajax({
        type : "POST",
        url : url.sendMessage,
        data : data,
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
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