$(document).ready(function () {
    $("form").submit(function (event) {

        var formData = {
            userid: $("#userid").val(),
            Post_description: $("#Post_description").val(),
            Post_title: $("#Post_title").val()
        }

        $.ajax({
           
            url: "php/insert.php",
            type: "POST",
            data: formData,
            dataType: "JSON",
            // encode: true,
            success: function (response) {
                if (response[0]['success']) {
                    alert("Insertion Sucessful");
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