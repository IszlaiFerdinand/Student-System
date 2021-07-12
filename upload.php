<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ >
    <title>Document</title>
</head>
<body>
<?php
  //feltoltes,atnevezes,adatbazisba beillestes
    session_start();
            $target_dir = "Uploads/";
            $fileName = $_FILES['file'];
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uOk = 1;
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $feltoltoneve = $_SESSION["user"];
            $elotag = "KT ";
            $ujnev = "Uploads/".$elotag.$feltoltoneve.".".$ext;
            $felhasznalo = $_SESSION["userid"];
            $nev = $_SESSION["user"];
            
            $hostname = 'localhost';
             $user = 'root';
             $password = '';
             $dbname = 'szakdolgozatab';
             
             //kapcsolat létesítése
             $db =mysqli_connect($hostname, $user, $password, $dbname);
             $db = new mysqli($hostname, $user, $password, $dbname);

            $sql = "SELECT Email from diak WHERE CNP = '$felhasznalo'";
            $result1 = $db->query($sql);
            $row = $result1->fetch_assoc();
            if ($row['Email']){
            $to_email = $row['Email']; 
            }
            
            
             $subject = "Kutatási terv feltöltésének megerősitése";
             $body = "Szép napot ".$nev." sikeresen feltöltötte a kutatási tervet.\nTovábbi szép napot kíván az KGTK!";
             $headers = "From: proba3682@gmail.com";

            if ($ext == "doc" || $ext == "docx" || $ext == "pdf" ){
              if (move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) { 
                if(rename($target_file, $ujnev) && mail($to_email,$subject,$body, $headers)){
                  $sql="UPDATE `szakdolgozat` SET `KutatasiTerv` = '$ujnev' WHERE  CNP = '$felhasznalo'";
                  if($result1 = $db->query($sql)){
                  echo '<script language="javascript">';
                  echo "alert('A kutatási tervet sikeresen feltöltötted, megerősítő E-mailt küldtünk az E-mail címedre!')";
                  echo '</script>';
                  }
                }
                else {
                  echo '<script language="javascript">';
                  echo "alert('A filet feltöltése sikertelen!')";
                  echo '</script>';
                }
               }
            }             
            else {
                  echo '<script language="javascript">';
                  echo "alert('Nem megfelelő típusú filet adtál meg!')";
                  echo '</script>';
            }

          

        ?>
         <script type="text/javascript">
      window.location = "index.php";
      </script>  
</body>
</html>

