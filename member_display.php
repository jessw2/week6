<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Display Members</title>
</head>
<body>
<h1>Display All Members</h1>
<?php
require_once("../../files/settings.php");

$conn = mysqli_connect($host, $user, $pswd, $dbnm);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else{
    echo "Connected to database successfully<br>";

}

$query = "SELECT member_id, fname, lname FROM vipmember";
$result = mysqli_query($conn, $query);
if(!$result){
    die("Query failed: " . mysqli_error($conn));
} else{
    echo "Query successful<br>";
}

echo "<table border='1'>";
echo "<tr>
    <th>Member ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    </tr>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
        <td>{$row['member_id']}</td>
        <td>{$row['fname']}</td>
        <td>{$row['lname']}</td>
        </tr>";
}
echo "</table>";
mysqli_close($conn);
?>

</body>
</html>

