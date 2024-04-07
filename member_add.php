<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>Member Add</title> 
</head> 
<body> 
<?php
require_once("../../files/settings.php"); // the file contains the necessary connection details.

// Connect to the database
$conn = mysqli_connect($host, $user, $pswd, $dbnm);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Create the vipmember table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS vipmember (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    email VARCHAR(40) NOT NULL,
    phone VARCHAR(20)
)";

// Check if form data has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data and sanitize it
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';

    // Insert form data into the vipmember table
    $insertQuery = "INSERT INTO vipmember (fname, lname, gender, email, phone) VALUES ('$fname', '$lname', '$gender', '$email', '$phone')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "New member added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
