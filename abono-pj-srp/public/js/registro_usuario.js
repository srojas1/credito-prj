$(document).ready(function(){
    $(document).on('click', '.registro_usuario', function (event) {
        $.ajax({
            type:"POST",
            url: 'registrarUsuario',
            cache: false,
            data: {
                dni: $(document).find('#dni').val(),
                nombre: $(document).find('#nombre').val(),
                apellido: $(document).find('#apellido').val(),
                telefono: $(document).find('#telefono').val(),
            }
        }).done(function(data){
            if(data['estado'] === true) {
                alert("Usuario registrado exitosamente")
                window.location.href = "login";
            } else {
                console.log(data['error_msg']);
                alert("Ocurrió un problema con el registro");
            }
        });
    });
});
