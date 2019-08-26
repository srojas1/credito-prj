function validateEmptyField(inputField) {
    var empty = false;
    $(inputField).each(function() {
        if ($(this).val().length == 0) {
            empty = true;
        }
    });
    if (empty) {
        $('.registro_abono').attr('disabled', 'disabled');
    } else {
        $('.registro_abono').removeAttr('disabled');
    }
}

$(document).ready(function(){
    $('div.intendente_data').hide();

    $('#dni_intendente').on('keyup', function(e){
        if($(this).val().length === 8) {

            $.ajax({
                type:"POST",
                url: 'obtenerIntendente',
                cache: false,
                data: {
                    dni_intendente: $(document).find('#dni_intendente').val(),
                }
            }).done(function(data){
                if(data['estado'] === true) {
                    $('#id_intendente').val(data['data'].id_intendente);
                    $('#nombres_intendente').val(data['data'].nombres_intendente);
                    $('#apellidos_intendente').val(data['data'].apellidos_intendente);
                    $('#telefono_intendente').val(data['data'].telefono);
                    $('div.intendente_data').show();
                } else {
                    alert("El intendente no existe");
                }
            });
        } else {
            $('div.intendente_data').hide();
        }
    });

    $(document).on('click', '.registro_abono', function (event) {
        var postData = new FormData($("#registro_abono_form")[0]);

        $.ajax({
            type:"POST",
            url: 'registrarAbono',
            contentType: false,
            cache: false,
            processData: false,
            data: postData
        }).done(function(data){
            if(data['estado'] === true) {
                alert("Abono registrado exitosamente")
                window.location.href = "dashboard";
            } else {
                alert("Ocurrió un problema con el registro");
            }
        });
    });

    var formInputs = $('#registro_abono_form input:not(".intendente_val")');

    $('#registro_abono_form input').keyup(function() {
        validateEmptyField(formInputs);
    });

    $('#registro_abono_form input[type=file]').change(function(){
        validateEmptyField(formInputs);
    })
});
