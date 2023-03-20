$(document).ready(function () {
  $("form").submit(function (event) {
    var firstname = $("#firstname").val()
    var lastname = $("#lastname").val()
    var email = $("#email").val()
    var password = $("#password").val()

    

    var formData = {
      firstname: $("#firstname").val(),
      lastname: $("#lastname").val(),
      email: $("#email").val(),
      password: $("#password").val()
    }

    $.ajax({
      type: "POST",
      url: "php/signup.php",
      data: formData,
      dataType: "json",
      encode: true,
      success: function(response) {
        if(response[0].success){
          alert("Signup Sucessful");
        window.location.href = 'login.html';

        }
        else{
          alert(response[0].message);
        }
      },
      error: function (xhr, status, error) {
        alert("failed" + xhr + status + error);
      }

    });

    event.preventDefault();
  });
});