<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/table.css" type="text/css">
    <meta http-equiv="refresh" content="10">
    <title>Táblázat</title>
</head>
<body>
<div class="php">
    <h1>
<?php
session_start();
//kapcsolat létesítése
$hostname = 'localhost';
$user = 'root';
$password = '';
$dbname = 'szakdolgozatab';

$conn =mysqli_connect($hostname, $user, $password, $dbname);
$conn = new mysqli($hostname, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

//ellenorzo select
$sql = "SELECT * FROM szakdolgozat";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)!=0){

while($rand = mysqli_fetch_assoc($result)){
    $resultset[]=$rand;
}
$html = "<table id='table'><tr><th>".implode('</th><th>',array_keys($resultset[0])).'</th></tr>';
foreach($resultset as $set){
    $html .= "<tr><td>".implode('</td><td>',$set).'</td></tr>';
}
print $html.'</table>';
echo "<form action='./index.php'>";
      echo  '<input type="submit" value="Vissza a Főoldalra!" />';
    echo "</form>";
}
else {
echo '<div class="php"><h1>Nincs egy record sem!</h1></div>';
echo "<form action='./index.php'>";
      echo  '<input type="submit" value="Vissza a Főoldalra!" />';
    echo "</form>";
}
?>
</h1>
</div>


</body>
</html>