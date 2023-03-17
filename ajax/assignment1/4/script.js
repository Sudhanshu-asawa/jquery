$(document).ready(function(){
    $("#form1").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: "data.php",
            type: "POST", 
            data: new FormData(this),
            processData: false, 
            contentType: false, 
            success: function(response){ console.log(response);
                $("#image").attr("src", response); 
            },

        });
    });
});