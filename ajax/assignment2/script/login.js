$(document).ready(function () {
    $("form").submit(function (event) {

        var formData = {
            email: $("#email").val(),
            password: $("#password").val()
        }

        $.ajax({
           
            url: "php/login.php",
            type: "POST",
            data: formData,
            dataType: "JSON",
            encode: true,
            success: function (response) {
                console.log(response);
                if (response[0]['success']) {
                    alert("Login Sucessful");
                    window.location.href = 'view.html';

                }
                else {
                    alert(response[0]['message']);
                }
            },
            error: function (xhr, status, error) {
                alert("failed" + xhr + status + error);
            }

        });

        event.preventDefault();
    });
});