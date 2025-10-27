<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Marks Entry</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: white;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0,0,0,0.2);
        width: 320px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 6px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    button,
    input[type="submit"],
    input[type="reset"] {
        margin-top: 12px;
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button {
        background-color: #007bff;
        color: white;
    }
    button:hover {
        background-color: #0056b3;
    }

    input[type="submit"] {
        background-color: #28a745;
        color: white;
    }
    input[type="submit"]:hover {
        background-color: #218838;
    }

    input[type="reset"] {
        background-color: #dc3545;
        color: white;
    }
    input[type="reset"]:hover {
        background-color: #c82333;
    }

    #total {
        margin-top: 10px;
        text-align: center;
        font-weight: bold;
        color: #333;
    }
</style>
</head>

<body>

<form action="card.php" method="post">
    <h2>Student Marks Entry</h2>

    <label>Enter Your Name:</label>
    <input type="text" name="n" required>

    <label>Roll Number:</label>
    <input type="number" name="roll" required>

    <label>Enter Mark 1:</label>
    <input type="number" id="m1" name="mark1" required>

    <label>Enter Mark 2:</label>
    <input type="number" id="m2" name="mark2" required>

    <label>Enter Mark 3:</label>
    <input type="number" id="m3" name="mark3" required>

    <label>Enter Mark 4:</label>
    <input type="number" id="m4" name="mark4" required>

    <label>Enter Mark 5:</label>
    <input type="number" id="m5" name="mark5" required>

    <label>Enter Mark 6:</label>
    <input type="number" id="m6" name="mark6" required>

    <button type="button" onclick="total()">Calculate Total</button>

    <p id="total"></p>

    <input type="submit" value="Generate Progress Card">
    <input type="reset" value="Reset">
</form>

<script>
function total() {
    let m1 = Number(document.getElementById("m1").value);
    let m2 = Number(document.getElementById("m2").value);
    let m3 = Number(document.getElementById("m3").value);
    let m4 = Number(document.getElementById("m4").value);
    let m5 = Number(document.getElementById("m5").value);
    let m6 = Number(document.getElementById("m6").value);

    let sum = m1 + m2 + m3 + m4 + m5 + m6;
    document.getElementById("total").innerText = "TOTAL MARKS: " + sum;
}
</script>

</body>
</html>
