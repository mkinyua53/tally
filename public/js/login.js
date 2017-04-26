// Author: Mwatha Kinyua <mwatha.knyua@hotmail.com>
// To be used with native laravel login form. Add a span with .status at the top of the file and  two more span with .email-error and .password-error below the email input and password input respectively.

$(function(){
    var url = window.location.origin
    var span = [$('.status'), $('.email-error'), $('.password-error')]
    
    for (var i = span.length - 1; i >= 0; i--) {
        span[i].css("text-align","center").css("color","maroon")
    }

    $('#login-form').submit(function(e){
        var formdata = $(this).serialize()
        $('.status').empty().html('<i>Logging you in ...</i>')
        e.preventDefault()

        $.ajax({
            type: "POST",
            url: url+"/login",
            data: formdata,

            success: function(data){
                $('.status').empty().prepend('<div class="alert alert-success text-center">Successfully Logged In!</div>')
                setTimeout(function(){
                    window.location.href = url+"/home"
                },500)                    
            },
            error: function(data){
                if (data.status == 422) {
                    $('.status').empty().html('<i>ERROR: Review your inputs</i>')
                    var msg = $.parseJSON(data.responseText)
                    
                    if (msg.email) {
                        $('.email-error').empty().html('<strong>'+msg.email+'</strong>')
                    }
                    if (msg.password) {
                        $('.password-error').empty().html('<strong>'+msg.password+'</strong>')
                    }
                }
                else{
                    $('.status').empty().html('<i><strong>Your session Expired</strong></i>')
                    setTimeout(function(){
                        window.location.href = url+"/login"
                    },2000)
                }
            }
        })
    })
})
