<?php
include 'dblogin.php';

    $username=$_POST["email"];
    $password=$_POST["password"];


    $query = "SELECT `email`,`password` FROM $tbname";
    $result = $conn -> query($query);
    $pass = false;
    $user = False;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["email"] == $username) {
                $user = true;
                if ($row["password"] == $password) {
                    $pass = true;

                    break;
                }
            }
        }
    }
    if ($user) {
        if ($pass) {
            $result_arr[]=array("success"=>true);
            
        } else {
            $result_arr[]=array("message"=>"Invalid Password");
        }
    } else {
        $result_arr[]=array("message"=>"Invalid Username");
    }
    echo json_encode($result_arr);

    ?>
