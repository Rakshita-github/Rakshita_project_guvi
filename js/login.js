function login() {
    var username = $('#username').val();
    var password = $('#password').val();
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function(response){
            $('#loginMessage').html(response);
            if (response.includes("successfully")) {
                localStorage.setItem('loggedIn', 'true');
                window.location.href = 'profile.html';
            }
        }
    });
}