<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $moviename = $_POST['title'];
    $rating = $_POST['rating'];


    $sql = "INSERT INTO `movierating` (`Movie_Name`,`Rating`) VALUES ('$moviename', '$rating')";

    if ($conn->query($sql) === TRUE) {
        
    }
    // } else {
    //     echo "Error: " . $sql . "<br>" .$conn->error;
    // }


    $sql_select = "SELECT * FROM movierating";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $title = $row["Movie_Name"];
            $rating = $row["Rating"];

            $return_arr[] = array(
                "id" => $id,
                "Title" => $title,
                "rating" => $rating
            );
        }
        echo json_encode($return_arr);

    } else {
        echo "0 results";
    }
}

?>