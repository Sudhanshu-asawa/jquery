<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "final";
$tbname = "usertb";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//creating database if exist
$createdb = "CREATE DATABASE IF NOT EXISTS $dbname";

$conn->query($createdb);
$conn->select_db($dbname);
$createtb = "CREATE TABLE IF NOT EXISTS  $tbname(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `firstname` VARCHAR(30), `lastname` VARCHAR(50),`email` VARCHAR(50),`password` VARCHAR(50))";
if ($conn->query($createtb) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}