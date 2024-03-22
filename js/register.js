function register() {
    var username = $('#username').val();
    var password = $('#password').val();
    $.ajax({
        url: 'register.php',
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function(response){
            $('#registerMessage').html(response);
            if (response.includes("successfully")) {
                window.location.href = 'login.html';
            }
        }
    });
}