<?php
$roll = $_POST['roll'];
$name = $_POST['n'];
$gender = $_POST['gender'];
$m1 = $_POST['m1'];
$m2 = $_POST['m2'];
$total = $m1 + $m2;
$con = mysqli_connect("localhost", "root", "", "student");

if ($con) {

    $check = "SELECT `ROLL NO` FROM form WHERE `ROLL NO`='$roll'";

    $result = mysqli_query($con, $check);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("ROLL NO ALREADY EXIST"); document.location="form.php";</script>';
    } else {
        $str = "INSERT INTO form VALUES('$roll','$name','$gender','$m1','$m2','$total')";
        $insert = mysqli_query($con, $str);

        if ($insert) {
            echo '<script>alert("NEW ROW INSERTED SUCCESSFULLY"); document.location="form.php";</script>';
        }
    }

}
?>
