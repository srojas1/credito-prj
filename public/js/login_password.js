$(document).ready(function(){

    //validate user
    $(document).on('click', '.login_password', function (event) {
        $.ajax({
            type:"POST",
            url: 'validatePassword',
            cache: false,
            data: {
                password: $(document).find('#password').val()
            }
        }).done(function(data){
            if(data['estado'] === true) {
                window.location.href = "dashboard";
            } else {
                alert("password incorrecta");
            }
        });
    });
});
