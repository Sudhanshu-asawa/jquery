<?php

include  'dbconfig.php';

    $post_title = $conn->real_escape_string($_POST['Post_title']);
    if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $post_title))) {
        $result_arr[]=array("message"=>"Invalid Post Title");
        echo json_encode($result_arr);
      exit;
    }
    $post_description = $conn->real_escape_string($_POST['Post_description']);
    if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $post_description))) {
        $result_arr[]=array("message"=>"Invalid Post Description ");
        echo json_encode($result_arr);
      exit;
    }
    $userid=$_POST['userid'];
    if (!(preg_match('/^[0-9 ]{1,5}$/', $userid))) {
        $result_arr[]=array("message"=>"Invalid UserID ");
        echo json_encode($result_arr);
      exit;
    }


    $query = "SELECT `userid` FROM $tbname";
    $result = $conn -> query($query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["userid"] == $userid) {
                $return_arr[] = array("message" => "UserID aready exists");
                echo json_encode($return_arr);
                exit;
                }
            }
        }

    $sql = "INSERT INTO $tbname (userid,post_title, post_description) VALUES (?,?,?)";
    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("iss",$userid,$post_title,$post_description);
    if ($stmt->execute() === TRUE) {
        $result_arr[]=array("success"=>true);
        echo json_encode($result_arr);
        exit;
    } else {
        $result_arr[]=array("message"=>"error in inserting data");
    }

    echo json_encode($result_arr);


?>