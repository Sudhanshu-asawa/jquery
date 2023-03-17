<?php 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else{
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



// file format check
if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"
&& $filetype != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
   echo $target_file = $target_dir . basename($_FILES["image"]["name"]);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>