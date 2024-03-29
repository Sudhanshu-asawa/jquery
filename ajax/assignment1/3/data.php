<?php include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['Id'];
    $pattern = "/^[a-zA-Z ]{1,30}$/";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $location = $_POST['location'];
    $post = $_POST['Post'];

    if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $fname))) {
        echo "<script>alert('Invalid First Name')</script>";
        return;
    }

    if (!(preg_match($pattern, $lname))) {
        echo "<script>alert('Invalid Last Name')</script>";
        return;
    }

    if (!(preg_match($pattern, $location))) {
        echo "<script>alert('Invalid location')</script>";
        return;
    }
    if (!(preg_match('/^[a-zA-Z0-9 ]{1,30}$/', $post))) {
        echo "<script>alert('Invalid Office Name')</script>";
        return;
    }

    $sql = "INSERT INTO employee (First_Name, Last_Name, `Location`, Post) 
            VALUES ('$fname', '$lname', '$location', '$post')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_select = "SELECT * FROM employee";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["First_Name"] . "</td><td>"
            . $row["Last_Name"] . "</td><td>" . $row["Location"]
            . "</td><td>" . $row["Post"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
