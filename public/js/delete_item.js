/**
 * Elimina un elemento
 * 
 * @param {*} id_elemento 
 * @param {*} controlador 
 */
function delete_item(delete_url,token) {

    swal({
        title: "¿Estás seguro de eliminar este elemento?",
        text: "Una vez eliminado no podrás recuperarlo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then(function(willDelete){
        if (willDelete) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type : "DELETE",
                url : delete_url,
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
        } else {
          swal("No se borrará el archivo");
        }
      });
}