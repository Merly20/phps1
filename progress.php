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

$rolls = $conn->query("SELECT `ROLL NO`, `NAME` FROM form");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Progress Card</title>
  <style>
    body { font-family: Arial, sans-serif; background:#dff0ff; padding: 40px; }
    form, .card {
      max-width: 400px; margin: auto; background: white;
      padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; margin-bottom: 30px;
    }
    h2 { text-align: center; }
  </style>
</head>
<body>

<form method="post">
  <label for="roll">Select Roll Number:</label>
  <select id="roll" name="roll" required>
    <option value="">--Select Roll Number--</option>
    <?php while ($row = $rolls->fetch_assoc()) { ?>
      <option value="<?php echo $row['ROLL NO']; ?>" <?php if($student && $student['ROLL NO'] == $row['ROLL NO']) echo "selected"; ?>>
        <?php echo $row['ROLL NO'] . " - " . $row['NAME']; ?>
      </option>
    <?php } ?>
  </select>

  <input type="submit" name="show" value="Show Progress">
</form>

<?php if ($student) {
    $total = $student['TOTAL'];
    $grade = ($total >= 90) ? 'A+' :
             (($total >= 75) ? 'A' :
             (($total >= 60) ? 'B' :
             (($total >= 50) ? 'C' : 'Fail')));
?>
<div class="card">
  <h2>Progress Card</h2>
  <p><strong>Roll No:</strong> <?php echo $student['ROLL NO']; ?></p>
  <p><strong>Name:</strong> <?php echo $student['NAME']; ?></p>
  <p><strong>Gender:</strong> <?php echo $student['GENDER']; ?></p>
  <p><strong>Address:</strong> <?php echo $student['ADRESS']; ?></p>
  <p><strong>Phone No:</strong> <?php echo $student['PHONE NO']; ?></p>

  <hr>

  <p><strong>Mark 1:</strong> <?php echo $student['MARK1']; ?></p>
  <p><strong>Mark 2:</strong> <?php echo $student['MARK2']; ?></p>
  <p><strong>Total:</strong> <?php echo $student['TOTAL']; ?></p>
  <p><strong>Grade:</strong> <?php echo $grade; ?></p>
</div>
<?php } ?>

</body>
</html>
