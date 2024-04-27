<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>Member Add Form</title> 
</head> 
<body> 
<h1>Member Add Form</h1> 
<form action = "member_add.php" method = "POST">
    <label>First Name:</label><input type="text" name="fname" required><br>
    <label>Last Name:</label><input type="text" name="lname" required><br>
    <label>Gender:</label><input type="text" name="gender" required><br>
    <label>Email:</label><input type="text" name="email" required><br>
    <label>Phone:</label><input type="text" name="phone" required>
<input type="submit" value="Add Member">
</body>  
</html> 