<?php 
$con = mysqli_connect("localhost", "root", "", "student");
if (!$con) {
    echo "not connected";
}

$roll_query = "SELECT `ROLL NO` FROM form";
$roll_result = mysqli_query($con, $roll_query);
?>

<form action="" method="post">
    Roll No:
    <select name="roll" id="roll" required>
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
        <form action="" method="post">
            <input type="hidden" name="roll" value="<?php echo $row['ROLL NO']; ?>">
            Name: <input type="text" name="name" value="<?php echo $row['NAME']; ?>"><br>
            Gender: <input type="text" name="gender" value="<?php echo $row['GENDER']; ?>"><br>
            Marks 1: <input type="number" name="mark1" value="<?php echo $row['MARK1']; ?>"><br>
            Marks 2: <input type="number" name="mark2" value="<?php echo $row['MARK2']; ?>"><br> 
            <input type="submit" name="update" value="Update Details">
        </form>
        <?php
    } else {
        echo "No record found.";
    }
}

if (isset($_POST['update'])) {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $mark1 = $_POST['mark1'];
    $mark2 = $_POST['mark2'];
    $total = $mark1 + $mark2;

    $update_query = "UPDATE form SET `NAME`='$name', `GENDER`='$gender', `MARK1`='$mark1', `MARK2`='$mark2', `TOTAL`='$total' WHERE `ROLL NO`='$roll'";
    mysqli_query($con, $update_query);
    echo "Record updated successfully!";
}

mysqli_close($con);
?>
