
$(document).ready(function(){
    $('#login-admin').on('submit',function(e){
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
            if(resultado.respuesta == 'exitoso'){
                swal("Login Correcto", "Bienvenid@ "+resultado.usuario+" !!", "success");
                setTimeout(function(){
                    window.location.href='admin-area.php';
                },2000);
            }else{
                console.log(data);
                swal("Error", "Usuario o password incorrectos", "error");
            }
        }).fail( function(data){
            console.log(data);
            swal("Error", "Usuario o password incorrectos", "error");
        });
    });

});

