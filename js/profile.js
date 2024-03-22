$(document).ready(function(){
    var loggedIn = localStorage.getItem('loggedIn');
    if (!loggedIn || loggedIn !== 'true') {
        window.location.href = 'login.html';
    }
    $.ajax({
        url: 'getProfile.php',
        type: 'GET',
        success: function(response){
            $('#profileDetails').html(response);
        }
    });
});
function logout() {
    localStorage.removeItem('loggedIn');
    window.location.href = 'login.html';
}

