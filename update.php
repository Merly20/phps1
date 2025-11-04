<?php 
$con = mysqli_connect("localhost", "root", "", "student");
if (!$con) {
    die("Database connection failed");
}

// Fetch roll numbers for dropdown
$roll_query = "SELECT `ROLL NO` FROM form";
$roll_result = mysqli_query($con, $roll_query);
?>

<!-- Roll number selection form -->
<form action="" method="post">
    Roll No:
    <select name="roll" id="roll" required>
        <option value="">--Select Roll No--</option>
        <?php
        while ($row = mysqli_fetch_assoc($roll_result)) {
            echo '<option value="' . $row['ROLL NO'] . '">' . $row['ROLL NO'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="show" value="Show Details">
</form>

<?php
if (isset($_POST['show'])) {
    $roll = $_POST['roll'];
    $query = "SELECT * FROM form WHERE `ROLL NO`='$roll'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <h3>Student Details:</h3>
        <form method="post">
            Roll No: <input type="text" name="roll" value="<?php echo $row['ROLL NO']; ?>" readonly><br><br>
            Name: <input type="text" name="name" value="<?php echo $row['NAME']; ?>" readonly><br><br>
            Gender: <input type="text" name="gender" value="<?php echo $row['GENDER']; ?>" readonly><br><br>
            Marks 1: <input type="number" name="mark1" value="<?php echo $row['MARK1']; ?>" required><br><br>
            Marks 2: <input type="number" name="mark2" value="<?php echo $row['MARK2']; ?>" required><br><br>
            Total: <input type="number" name="total" value="<?php echo $row['TOTAL']; ?>" readonly><br><br>
            <input type="submit" name="update" value="Update">
        </form>
        <?php
    } else {
        echo "No record found.";
    }
}

// When Update button is clicked
if (isset($_POST['update'])) {
    $roll = $_POST['roll'];
    $mark1 = $_POST['mark1'];
    $mark2 = $_POST['mark2'];
    $total = $mark1 + $mark2;

    $update_query = "UPDATE form SET MARK1='$mark1', MARK2='$mark2', TOTAL='$total' WHERE `ROLL NO`='$roll'";
    if (mysqli_query($con, $update_query)) {
        echo "<p style='color:green;'>Record updated successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error updating record.</p>";
    }
}

mysqli_close($con);
?>
