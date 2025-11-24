<?php
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student = null;
if (isset($_POST['show'])) {
    $roll = $conn->real_escape_string($_POST['roll']);
    $result = $conn->query("SELECT * FROM form WHERE `ROLL NO`='$roll'");
    $student = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $roll = $conn->real_escape_string($_POST['roll']);
    $mark1 = intval($_POST['mark1']);
    $mark2 = intval($_POST['mark2']);
    $total = $mark1 + $mark2;

    $stmt = $conn->prepare("UPDATE form SET MARK1=?, MARK2=?, TOTAL=? WHERE `ROLL NO`=?");
    $stmt->bind_param("iiii", $mark1, $mark2, $total, $roll);
    $stmt->execute();
    $stmt->close();

    echo "<p style='color:green; text-align:center;'>Record updated successfully.</p>";

    $result = $conn->query("SELECT * FROM form WHERE `ROLL NO`='$roll'");
    $student = $result->fetch_assoc();
}

// Fetch rolls for dropdown
$rolls = $conn->query("SELECT `ROLL NO` FROM form");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Marks</title>
  <style>
    body { font-family: Arial, sans-serif; background:#faf0d7; padding:40px; }
    form { max-width: 400px; margin:auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
    input, select { width: 100%; padding: 10px; margin-top: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; }
    input[type=submit] { background: #00bcd4; color: white; border: none; margin-top: 15px; cursor: pointer; }
    input[type=submit]:hover { background: #0097a7; }
  </style>
</head>
<body>

<form method="post">
  <label for="roll">Select Roll Number:</label>
  <select id="roll" name="roll" required>
    <option value="">--Select Roll Number--</option>
    <?php while ($row = $rolls->fetch_assoc()) { ?>
      <option value="<?php echo $row['ROLL NO']; ?>" <?php if($student && $student['ROLL NO'] == $row['ROLL NO']) echo "selected"; ?>>
        <?php echo $row['ROLL NO']; ?>
      </option>
    <?php } ?>
  </select>

  <input type="submit" name="show" value="Show">

  <?php if ($student) { ?>
    <label for="mark1">Mark 1:</label>
    <input type="number" id="mark1" name="mark1" min="0" max="100" value="<?php echo $student['MARK1']; ?>" required>

    <label for="mark2">Mark 2:</label>
    <input type="number" id="mark2" name="mark2" min="0" max="100" value="<?php echo $student['MARK2']; ?>" required>

    <input type="submit" name="update" value="Update Marks">
  <?php } ?>
</form>

</body>
</html>
