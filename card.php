<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Progress Card</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }
    .card {
        background-color: white;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        width: 350px;
    }
    h2 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ccc;
    }
    th {
        background-color: #f5f5f5;
    }
    p {
        margin: 10px 0;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="card">
<?php
$name=$_POST['n'];
$roll=$_POST['roll'];
$m1 = $_POST['mark1'];
$m2 = $_POST['mark2'];
$m3 = $_POST['mark3'];
$m4 = $_POST['mark4'];
$m5 = $_POST['mark5'];
$m6 = $_POST['mark6'];

$total = $m1 + $m2 + $m3 + $m4 + $m5 + $m6;
$percentage = ($total/ 600)*100;

if ($percentage >= 90) $grade = "A+";
elseif ($percentage >= 80) $grade = "A";
elseif ($percentage >= 70) $grade = "B";
elseif ($percentage >= 60) $grade = "C";
elseif ($percentage >= 50) $grade = "D";
else $grade = "F";
?>

<h2>Student Progress Card</h2>

<p>Name: <?php echo htmlspecialchars($name); ?></p>
<p>Roll Number: <?php echo htmlspecialchars($roll); ?></p>

<table>
    <tr><th>Subject</th><th>Marks</th></tr>
    <tr><td>Mark 1</td><td><?php echo $m1; ?></td></tr>
    <tr><td>Mark 2</td><td><?php echo $m2; ?></td></tr>
    <tr><td>Mark 3</td><td><?php echo $m3; ?></td></tr>
    <tr><td>Mark 4</td><td><?php echo $m4; ?></td></tr>
    <tr><td>Mark 5</td><td><?php echo $m5; ?></td></tr>
    <tr><td>Mark 6</td><td><?php echo $m6; ?></td></tr>
</table>

<p>Total Marks: <?php echo $total; ?></p>
<p>Percentage: <?php echo number_format($percentage,2); ?>%</p>
<p>Grade: <?php echo $grade; ?></p>
</div>
</body>
</html>
