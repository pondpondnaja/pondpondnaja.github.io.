$(document).ready(function() {
    $('#login-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../querys/ajax-login.php',
            data: $('#login-form').serialize(),
            success: function(data){
                if(data.status === 'success') {
                    //alert(data.message);
                    //window.location = "index.php";
                    var check = document.location.href.includes('register');
                    if(check){
                        console.log(check);
                        window.location = "../index.php";
                    }else{
                        console.log(check);
                        document.location.reload(true);
                    }
                }
                else {
                    window.location = "pages/login.php";
                }
            }
        });
    });

    $('#logout_btn').click(function(){
        console.log('logout btn has been click');
        $.ajax({
            type: 'POST',
            url: '../querys/ajax-logout.php',
            success: function(respond){
                if(respond.status === 'success'){
                    //alert(respond.message);
                    //window.location = "index.php";
                    document.location.reload(true);
                }
            }
        });
    });
});