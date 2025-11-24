<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
  <style>
    body { font-family: Arial; background: #f4f6f8; padding: 40px; }
    form { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; }
    h2 { text-align: center; }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input, select { width: 100%; padding: 10px; margin-top: 5px; }
    input[type="submit"] { margin-top: 20px; background: #00bcd4; color: white; border: none; cursor: pointer; }
    input[type="submit"]:hover { background: #0097a7; }
    .error { color: red; text-align: center; }
  </style>
</head>
<body>
<h2>Student Registration</h2>

<form method="post" action="">
  <label>Roll No:</label><input type="text" name="roll" required>
  <label>Name:</label><input type="text" name="name" required>
  <label>Address:</label><input type="text" name="adres" required>
  <label>Phone:</label><input type="text" name="phone" required>
  <label>Username:</label><input type="text" name="username" required>
  <label>Password:</label><input type="password" name="password" required>
  <label>Retype Password:</label><input type="password" name="repassword" required>
  <label>Gender:</label>
  <select name="gender" required>
    <option value="">--Select--</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>
  <input type="submit" name="submit" value="Register Student">
</form>

<?php
if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost","root","","student");
    if (!$conn) die("Database connection failed");

    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $adres = $_POST['adres'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = $_POST['gender'];

    if ($password != $repassword) {
        echo "<p class='error'>Passwords do not match!</p>";
        exit;
    }

    $mark1 = 0; $mark2 = 0; $total = 0;

    $sql = "INSERT INTO form (`ROLL NO`,`NAME`,`GENDER`,`MARK1`,`MARK2`,`TOTAL`,`ADRESS`,`PHONE NO`,`USERNAME`,`PASSWORD`)
            VALUES ('$roll','$name','$gender',$mark1,$mark2,$total,'$adres','$phone','$username','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green; text-align:center;'>Student Registered Successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>
</body>
</html>
