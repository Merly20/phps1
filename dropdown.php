<?php
$con = mysqli_connect("localhost", "root", "", "student");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all roll numbers for dropdown
$roll_query = "SELECT `ROLL NO` FROM form";
$roll_result = mysqli_query($con, $roll_query);
?>

<form action="" method="post">
    <label for="roll">Roll No:</label>
    <select name="roll" id="roll" required>
        <option value="">--Select Roll No--</option>
        <?php
        while ($row = mysqli_fetch_assoc($roll_result)) {
            echo '<option value="' . $row['ROLL NO'] . '">' . $row['ROLL NO'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Show Details">
</form>

<?php
if (isset($_POST['roll'])) {
    $roll = $_POST['roll'];
    $query = "SELECT * FROM form WHERE `ROLL NO`='$roll'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h3>Student Details:</h3>";
        echo "Roll No: " . $row['ROLL NO'] . "<br>";
        echo "Name: " . $row['NAME'] . "<br>";
        echo "Gender: " . $row['GENDER'] . "<br>";
        echo "Marks 1: " . $row['MARK1'] . "<br>";
        echo "Marks 2: " . $row['MARK2'] . "<br>";
        echo "Total: " . $row['TOTAL'] . "<br>";
    } else {
        echo "No record found.";
    }
}

mysqli_close($con);
?>
