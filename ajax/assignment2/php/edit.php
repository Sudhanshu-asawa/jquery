<?php
include 'dbconfig.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $updatetitle = $conn->real_escape_string($_POST['Post_title']);
    if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $updatetitle))) {
        $result_arr[]=array("message"=>"Invalid Post Title");
        echo json_encode($result_arr);
      exit;
    }
    $updatedes = $conn->real_escape_string($_POST['Post_description']);
    if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $updatetitle))) {
        $result_arr[]=array("message"=>"Invalid Post Description ");
        echo json_encode($result_arr);
      exit;
    }

    $check = "SELECT `id` FROM $tbname";
    $result1 = mysqli_query($conn, $check);
    $num = $result1->num_rows;
    for ($i = 0; $i < $num; $i++) {
        $arr = mysqli_fetch_assoc($result1);
        if ($arr['id'] == $id) {
            if ($updatedes != null && $updatetitle != null) {
                $query = "UPDATE $tbname SET post_description='$updatedes',post_title='$updatetitle'  WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "Post Title and Description Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
            if ($updatedes != null) {
                $query = "UPDATE $tbname SET post_description='$updatedes' WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "Post Description Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
            if ($updatetitle != null) {
                $query = "UPDATE $tbname SET post_title='$updatetitle'  WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "Post Title Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
        }
    }

}

?>