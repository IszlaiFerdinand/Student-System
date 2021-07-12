<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/loginphp.css" type="text/css">
    <title>FSEGA szakdolgozat információ</title>
</head>
<body>
<div class="php">
    <h1>
<?php
session_start();
//formbol atvett adatok ellenörzése
if(isset($_POST["user"]) && isset($_POST["password"]) && ! empty( $_POST["user"] && ! empty( $_POST["password"] ))){
//kapcsolat létesítése
$hostname = 'localhost';
$user = 'root';
$password = '';
$dbname = 'szakdolgozatab';
$conn = new mysqli($hostname, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

//ellenorzo select prepare statement-el
$stmt = $conn->prepare("SELECT CNP, Csaladnev , Keresztnev FROM diak WHERE CNP = ? AND Jelszo = ?");
//tipusok es valtozok megadása
$stmt->bind_param("ss", $felhasznalonev, $jelszo);


$felhasznalonev = $_POST["user"];//"1991104260029";
$jelszo = md5($_POST["password"]);//"if3682";

//parancs futtatása a megadott paraméterekkel
$stmt->execute();

if($result = $stmt->get_result()){
  if(mysqli_num_rows($result)==1){
    echo "Sikeres azonosítás!<br>";
    $row = mysqli_fetch_array($result);
    echo "Üdvözöllek ".$row ["Csaladnev"]." ".$row ["Keresztnev"]."!<br>";
    echo "<form action='./index.php'>";
      echo  '<input type="submit" value="Vissza a Főoldalra!" />';
    echo "</form>";
    $_SESSION["user"] = $row ["Csaladnev"]." ".$row ["Keresztnev"];
    $_SESSION["userid"] = $row ["CNP"];
  }
  else{ echo "Sikertelen azonosítás!<br>";
  echo "Nem helyes felhasználónevet vagy jelszót adtál meg!<br>";
  echo "<form action='./login.php'>";
  echo  '<input type="submit" value="Vissza a bejelentkezéshez!" />';
echo "</form>";
  }
}
else
  echo "<br>Nem lehet lefuttatni a parancsot!<br>". mysqli_error($conn);
}
?>
</h1>
</div>


</body>
</html>