<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "final";
$tbname = "userdetails";


  $conn = new mysqli($servername, $username, $password,$dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $createtb = "CREATE TABLE IF NOT EXISTS $tbname (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,userid INT(3),
    post_title VARCHAR(30),
    post_description VARCHAR(30))";

if ($conn->query($createtb) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
}
