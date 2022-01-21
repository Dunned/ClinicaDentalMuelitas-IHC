$(document).ready(function(){
    $('#guardar-registro').on('submit',function(e){
        e.preventDefault();
        var datos=$(this).serializeArray();
        $.ajax({
            //Asi leemos aquel Request que dice POST
            type: $(this).attr('method'),
            //Despues son los datos que queremos enviar a ajax
            data: datos,
            //A donde se van a enviar
            url: $(this).attr('action'),
            //tipo de datos
            dataType: 'json',
            //Y cuando la llamada sea exitosa/ data es la respuesta que nos va a retornar este llamado
        }).done( function(data){
            var resultado = data;
            console.log(data);
            if(resultado.respuesta == 'exito'){
                swal("Correcto", "Se guardo Correctamente", "success");
            }else{
                swal("Error", "No se guardo", "error");
            }
        }).fail( function(data){
            swal("Error", "No se guardo", "error");
        });
    });

    //Eliminar un registro
    $('.borrar_registro').on('click',function(e) {
        e.preventDefault();
        var id=$(this).attr('data-id');
        var tipo=$(this).attr('data-tipo');
        swal({
            title: 'Estás Seguro?',
            text: "Esto no se puede deshacer!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar!!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
            $.ajax({
                            type:'post',
                            data: {
                                'id': id,
                                'registro': 'eliminar'
                            },
                            url: 'modelo-'+tipo+'.php',
                            success: function(data){
                                var resultado = JSON.parse(data);
                                if(resultado.respuesta == 'exito'){
                                    swal(
                                        'Eliminado!',
                                        'Se eliminó el registro de la dase de datos.',
                                        'success'
                                    )
                                    jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                                }                       
                            }
                       })
            } else if (result.dismiss === 'cancel') {
              swal(
                'Cancelado',
                'No se eliminó el registro',
                'error'
              )
            }
          })
    })
    //

   
});