<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1e1e2f;
      color: white;
      margin: 0;
      padding: 20px;
    }

    h3 {
      text-align: center;
      color: #00bcd4;
      margin-bottom: 20px;
    }

    a {
      display: block;
      color: #ffffff;
      background-color: #2c2c44;
      text-decoration: none;
      padding: 10px 15px;
      margin-bottom: 8px;
      border-radius: 4px;
      transition: background-color 0.3s, transform 0.2s;
    }

    a:hover {
      background-color: #00bcd4;
      color: #000;
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <h3>Navigation</h3>

  <a href="stureg.php" target="contentFrame">STUDENT REGISTRATION</a>
  <a href="markentry.php" target="contentFrame">MARK ENTRY</a>
  <a href="update.php" target="contentFrame">MARK UPDATE</a>
  <a href="delete.php" target="contentFrame">DELETE/UPDATE STUDENT</a>
  <a href="progress.php" target="contentFrame">VIEW PROGRESS CARD</a>

</body>
</html>
