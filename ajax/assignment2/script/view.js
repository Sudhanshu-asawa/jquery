$(document).ready(function () {
    
    $.ajax({
        type: "POST",
        url: "php/view.php",
        dataType: "json",
        encode: true,
        success: function (response) {
            // Clear previous table rows
            $("#mytable tbody").empty();

            var len = response.length;
            for (var i = 0; i < len; i++) {
                var id = response[i].id;
                var userid = response[i].userid;

                var title = response[i].Title;
                var des = response[i].des;
                var tr_str = "<tr>" + "<td>" + userid + "</td>" + "<td>" + title + "</td>" + "<td>" + des + "</td>" +
                    "<td><button class='deleteBtn' data-id='" + id + "'>Delete</button></td>" + 
                    "<td><button class='EditBtn' data-id='" + id + "'>Edit</button></td>"
                    "</tr>";
                $("#mytable tbody").append(tr_str);
            }
        
            $(".deleteBtn").on("click", function () {
                var id = $(this).data("id");
                var row = $(this).closest("tr");
                $.ajax({
                    type: "POST",
                    url: "php/delete.php",
                    data: { id: id },
                    success: function () {

                        row.remove();
                    }
                });
            });

            $(".EditBtn").on("click", function () {
                var id = $(this).data("id");
                sessionStorage.setItem("id", id);
                window.location.href = 'edit.html';
            });
        },
        error: function (xhr, status, error) {
            alert("failed" + xhr + status + error);
        }
    });

});
