function approve(approve_url,token){
    swal({
        title: "¿Estás seguro de que desea aprovar la transacción?",
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
          swal("No se aprovará la transacción");
        }
      });
}