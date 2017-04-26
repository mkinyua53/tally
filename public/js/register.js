// Author: Mwatha Kinyua <mwatha.kinyua@hotmail.com>
// To be used with native laravel register form. Add a span with .status at the top of the file and  three more span with .name-error, .email-error and .password-error below the name input, email input and password input respectively.

$(function(){
    var span = [$('.status'), $('.name-error'), $('.password-error'), $('.email-error')]
    var url = window.location.origin

    for (var i = span.length - 1; i >= 0; i--) {
        span[i].css("color","maroon")
    }

    $('#register-form').submit(function(e){
        e.preventDefault()
        $('.status').empty().html('Registering ...')
        var formdata = $(this).serialize()
        var register = url+"/register"

        $.ajax({
            type: "POST",
            data: formdata,
            url: register,

            success: function(){
                $('.status').empty().html('<i>You have been registered and logged in!')
                setTimeout(function(){
                    window.location.href = url+"/home"
                },2000)
            },
            error: function(data){
                console.log(data)
                if (data.status == 422) {
                    $('.status').empty().html('<i>ERROR: Review your inputs</i>')
                    var msg = $.parseJSON(data.responseText)
                    
                    if (msg.email) {
                        $('.email-error').empty().html('<strong>'+msg.email+'</strong>')
                    }
                    if (msg.password) {
                        $('.password-error').empty().html('<strong>'+msg.password+'</strong>')
                    }
                    if (msg.name) {
                        $('.name-error').empty().html('<strong>'+msg.password+'</strong>')
                    }
                }
                else{
                    $('.status').empty().html('<i><strong>Your session Expired</strong></i>')
                    setTimeout(function(){
                        window.location.href = url+"/register"
                    },2000)
                }
            }
        })
    })
})