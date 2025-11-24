<?php
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch roll numbers for dropdown
$rolls = $conn->query("SELECT `ROLL NO`, `NAME` FROM form ORDER BY `ROLL NO`");

if (isset($_POST['submit'])) {
    $roll = $conn->real_escape_string($_POST['roll']);
    $mark1 = intval($_POST['mark1']);
    $mark2 = intval($_POST['mark2']);
    $total = $mark1 + $mark2;

    $update = $conn->prepare("UPDATE form SET MARK1=?, MARK2=?, TOTAL=? WHERE `ROLL NO`=?");
    $update->bind_param("iiii", $mark1, $mark2, $total, $roll);
    $update->execute();
    $update->close();

    echo "<p style='color:green; text-align:center;'>Marks updated successfully for roll no: $roll</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mark Entry</title>
  <style>
    body { font-family: Arial, sans-serif; background: #eef2f7; padding: 40px; }
    form {
      max-width: 400px; margin: 0 auto; background: white; padding: 25px;
      border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    select, input[type=number], input[type=submit] {
      width: 100%; margin-top: 15px; padding: 10px; border-radius: 5px;
      border: 1px solid #ccc; font-size: 14px;
    }
    input[type=submit] {
      background-color: #00bcd4; color: white; border: none; cursor: pointer;
      font-size: 16px;
    }
    input[type=submit]:hover {
      background-color: #0097a7;
    }
  </style>
</head>
<body>

<form method="post" action="">
  <label for="roll">Select Roll Number:</label>
  <select id="roll" name="roll" required>
    <option value="">--Select Roll Number--</option>
    <?php while ($row = $rolls->fetch_assoc()) { ?>
      <option value="<?php echo $row['ROLL NO']; ?>">
        <?php echo $row['ROLL NO'] . " - " . $row['NAME']; ?>
      </option>
    <?php } ?>
  </select>

  <label for="mark1">Mark 1:</label>
  <input type="number" id="mark1" name="mark1" min="0" max="100" required>

  <label for="mark2">Mark 2:</label>
  <input type="number" id="mark2" name="mark2" min="0" max="100" required>

  <input type="submit" name="submit" value="Submit Marks">
</form>

</body>
</html>
