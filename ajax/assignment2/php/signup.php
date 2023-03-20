<?php
include 'dblogin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!(preg_match('/^[a-zA-Z ]{1,30}$/', $firstname))) {
        $result_arr[]=array("message"=>"Invalid First Name");
        echo json_encode($result_arr);
      exit;
    }
    if (!(preg_match('/^[a-zA-Z ]{1,30}$/', $lastname))) {
        $result_arr[]=array("message"=>"Invalid Last Name");
        echo json_encode($result_arr);
      exit;
    }

    $query = "SELECT `email` FROM $tbname";
    $result = $conn -> query($query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["email"] == $email) {
                $return_arr[] = array("message" => "email aready exists");
                echo json_encode($return_arr);
                exit;
                }
            }
        }
    


    $sql = "INSERT INTO $tbname (`firstname`,`lastname`,`email`,`password`) VALUES ('$firstname', '$lastname','$email','$password')";

    if ($conn->query($sql) === true) {
        $return_arr[] = array("success" => true);
        echo json_encode($return_arr);

    }
    

}
    




?>