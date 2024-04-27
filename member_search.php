<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Search Member Page</title>
</head>

<body>
    <h1>Search Member Page</h1>
    <form method="POST" action="member_search.php">
        <label for="lname">Search by Last Name:</label>
        <input type="text" id="lname" name="lname">
        <input type="submit" value="Search">
    </form>
    <?php
    require_once ("../../files/settings.php");
    $conn = mysqli_connect($host, $user, $pswd, $dbnm);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected to database successfully<br>";

    }

    // Sanitize the input
    $search_lname = mysqli_real_escape_string($conn, $_POST['lname']);

    // Query to search members by last name
    $query = "SELECT member_id, fname, lname, email FROM vipmember WHERE lname = '$search_lname'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Member ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $row["member_id"] . "</td>
                <td>" . $row["fname"] . "</td>
                <td>" . $row["lname"] . "</td>
                <td>" . $row["email"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
    // Free result set
    mysqli_free_result($result);
    // Close connection
    mysqli_close($conn);
    ?>
</body>

</html>