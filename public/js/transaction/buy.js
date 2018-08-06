/**
 * Show modal with info of buyer/seller
 */
function showDetailsModal(name,lastname,phone,mobile,bank,price,quantity,email,transaction){
            $('#names_details').html(`${name} ${lastname}`);
            $('#email_details').html(`e-mail:</abbr> ${email}`);
            $('#local_details').html(`Teléfono Local: ${phone}`);
            $('#mobile_details').html(`Teléfono movíl: ${mobile}`);
            $('#bank_details').html(`Banco: ${bank}`);
            $('#id_transaction_details').val(transaction);
            $('#details_body').html(
                `<tr>
                    <td style="color:black; !important">${price}</td>
                    <td style="color:black; !important">${quantity}</td>
                </tr>`
            );

            $('#_BuyModal').modal('show');
}

function makeTransaction(_url){
    $.ajax({
        type : "PUT",
        url : url.makeTransaction,
        dataType: 'json',
        data : $('#_buy_form').serialize(),
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
$('#_buy_btn').click(function(e){
    e.defaultPrevented;
    makeTransaction();
})