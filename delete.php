<?php
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $roll = $conn->real_escape_string($_POST['roll']);
    $conn->query("DELETE FROM form WHERE `ROLL NO`='$roll'");
    echo "<p style='color:red; text-align:center;'>Student record deleted.</p>";
}

// Fetch rolls for dropdown
$rolls = $conn->query("SELECT `ROLL NO`, `NAME` FROM form");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Student</title>
  <style>
    body { font-family: Arial, sans-serif; background:#ffe3df; padding:40px; }
    form { max-width: 350px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
    select, input[type=submit] { width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; }
    input[type=submit] { background: #f44336; color: white; border: none; cursor: pointer; }
    input[type=submit]:hover { background: #d32f2f; }
  </style>
</head>
<body>

<form method="post">
  <label for="roll">Select Roll Number:</label>
  <select id="roll" name="roll" required>
    <option value="">--Select Roll Number--</option>
    <?php while ($row = $rolls->fetch_assoc()) { ?>
      <option value="<?php echo $row['ROLL NO']; ?>">
        <?php echo $row['ROLL NO'] . " - " . $row['NAME']; ?>
      </option>
    <?php } ?>
  </select>

  <input type="submit" name="delete" value="Delete Student">
</form>

</body>
</html>
