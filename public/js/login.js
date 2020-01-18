$(document).ready(function(){
    $('#loading').hide();
    //validate user
    $(document).on('click', '.login_user', function (event) {
        $('#loading').show();
        if($(document).find('#dni').val()==="") {
            alert("Ingresar DNI");
            return;
        }
        setTimeout(function() {
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
        }, 3000)
    });
});
