<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql_select = "SELECT * FROM $tbname";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $userid = $row['userid'];
            $title = $row["post_title"];
            $des = $row["post_description"];

            $return_arr[] = array(
                "id" => $id,
                "userid" => $userid,
                "Title" => $title,
                "des" => $des
            );
        }
        echo json_encode($return_arr);

    } 
}

?>