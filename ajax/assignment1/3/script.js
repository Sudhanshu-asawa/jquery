$(document).ready(function () {
    $('#myform').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'data.php',
            data: $('#myform').serialize(),
            success: function (response) {
                $("tbody").empty();
                $('#mytable tbody').append(response)
                $('#id').val('');
                $('#fname').val('');
                $('#lname').val('');
                $('#location').val('');
                $('#Post').val('');
                
            },



            error: function (xhr, status, error) {
                alert("failed" + xhr + status + error);
            }
        });
    });
});