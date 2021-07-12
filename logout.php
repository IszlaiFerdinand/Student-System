<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/loginphp.css" type="text/css">
    <title>Logout</title>
</head>
<body>
<div class="php">
    <h1>
<?php
//session valtozo resetelese
session_start();
session_destroy();
echo "Sikeresen kijelentkeztél!";
echo "<form action='./index.php'>";
      echo  '<input type="submit" value="Vissza a Főoldalra!" />';
    echo "</form>";
?>
</h1>
</div>


</body>
</html>