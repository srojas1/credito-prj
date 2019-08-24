$(document).ready(function(){

    //validate user
    $(document).on('click', '.login_user', function (event) {

        if($(document).find('#dni').val()==="") {
            alert("Ingresar DNI");
            return;
        }

        $.ajax({
            type:"POST",
            url: 'validateDNI',
            cache: false,
            data: {
                dni: $(document).find('#dni').val()
            }
        }).done(function(data){
            window.location = data;
        });
    });
});
