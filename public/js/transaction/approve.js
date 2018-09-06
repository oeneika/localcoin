/**
 * 
 * @param {*} sub_num submitting account number
 * @param {*} rec_num receiving account number
 * @param {*} sub_address submitting wallet address
 * @param {*} rec_address receiving walle address
 */
function openAccountsModal(type,sub_name, rec_name,sub_num,rec_num,sub_address,rec_address,sub_num_trans,rec_num_trans){

    $('#accounts_body').empty();

    $('#accounts_body').html(
        `<div class="row">
            <div class="col-md-6">
                <h3>Vendedor</h3>
                ${type == 1 ? sub_name : rec_name}
                <hr>
                <h5>Cuenta bancaria:</h5>
                <p>${type == 1 ? sub_num : rec_num}</p>
                <br/>
                <h5>Wallet:</h5>
                <p><small>${type == 1 ? sub_address : rec_address}</small></p>
                <h5>Número de Transferencia:</h5>
                <p><small>${type == 1 ? sub_num_trans : rec_num_trans}</small></p>
            </div>
            <div class="col-md-6">
                <h3>Comprador</h3>
                ${type == 1 ? rec_name : sub_name}
                <hr>
                <h5>Cuenta bancaria:</h5>
                <p>${type == 1 ? rec_num : sub_num}</p>
                <br/>
                <h5>Wallet:</h5>
                <p><small>${type == 1 ? rec_address : sub_address}</small></p>
                <h5>Número de Transferencia:</h5>
                <p><small>${type == 1 ? rec_num_trans : sub_num_trans}</small></p>
            </div>
         </div>`
    );

    $('#accountsModal').modal('show');
}

function approve(approve_url,token){
    swal({
        title: "¿Está usted seguro de querer aprobar esta transacción?",
        icon: "warning",
        buttons: true
      })
      .then(function(willApprove){
        if (willApprove) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type : "PUT",
                url : approve_url,
                dataType: 'json',
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
            console.log('Ooopa');
        } else {
          swal("Transacción no aprobada");
        }
      });
}