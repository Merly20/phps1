<form action="home.php" method="post">
    USERNAME:
    <input type="text" name="name"><br>
    PASSWORD:
    <input type="password" name="pass">
    <input type="submit" name="submit" value="login">
    <input type="reset" >
</form>
<?php
if(isset($_POST['submit'])){
$n=$_POST['name'];
$p=$_POST['pass'];
$con = mysqli_connect("localhost", "root", "", "student");
if (!$con) {
    echo "not connected";
}
$query = "SELECT * FROM login WHERE `username`='$n' AND `password`='$p'";
$result = mysqli_query($con, $query);
 if (mysqli_num_rows($result) != 1) {
        echo "<h3>❌ Invalid username or password.</h3>";
     }
     mysqli_close($con);
    }
?>