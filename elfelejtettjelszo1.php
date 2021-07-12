<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/loginphp.css" type="text/css">
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <title>FSEGA szakdolgozat információ</title>
</head>
<body>
<div class="php">
    <h1>
<?php
session_start();
//formbol atvett adatok ellenörzése
if(isset($_POST["CNP"]) && isset($_POST["e-mail"]) && isset($_POST["matricol"]) && !empty( $_POST["CNP"]) && ! empty( $_POST["e-mail"]) && !empty($_POST["matricol"])){
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



$CNP= $_POST["CNP"];
$email = $_POST["e-mail"];
$matricol = $_POST["matricol"];
//adatok helyességének ellenörzése
$sql = "SELECT * FROM diak WHERE CNP = '$CNP' AND  Email= '$email' AND MatricolSzam='$matricol'";

if($result = mysqli_query($conn,$sql)){
  if(mysqli_num_rows($result)==1){
    $row = $result->fetch_assoc();
    $nev= $row["Csaladnev"]." ".$row["Keresztnev"];
    $ujjelszo = substr($CNP, -6);
    $to_email = $email;
    $ujjelszoupdate = md5($ujjelszo);
    $sql1 = "UPDATE diak SET Jelszo = '$ujjelszoupdate' WHERE CNP = '$CNP'";
//mail szövegének felépítése
    $subject = "Újragenerált jelszó";
    $body = "Szép napot ".$nev." sikeresen újrageneráltuk a jelszavadat.\nAz új jelszavad a CNP-d utolsó 6 számjegye:".$ujjelszo." \nTovábbi szép napot kíván az KGTK!";
    $headers = "From: proba3682@gmail.com";
//mail elkuldese ez jelso update
    if($conn->query($sql1) === TRUE && mail($to_email,$subject,$body, $headers)){
        echo "Sikeres azonosítás!<br>";
        echo "Elküldtük az új jelszavadat az e-mail címedre!<br>";
        echo "<form action='./index.php'>";
        echo  '<input type="submit" value="Vissza a Főoldalra!" />';
        echo "</form>";
    }
    
    
    
  }
  else{ echo "Sikertelen azonosítás!<br>";
  echo "Nem helyes adatokat adtál meg!<br>";
  echo "<form action='./elfelejtettjelszo.php'>";
  echo  '<input type="submit" value="Ujrapróbálkozás!" />';
  echo "</form>";
  }
}
else
  echo "<br>Nem lehet lefuttatni a parancsot!<br>". mysqli_error($conn);
}
else {
    echo "Nem helyes adatokat adtál meg!<br>";
    echo '<a href="login.php">Vissza a főoldalra!</a>';
}
?>
</h1>
</div>


</body>
</html>