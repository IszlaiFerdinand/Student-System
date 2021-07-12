<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ >
    <title>FSEGA szakdolgozat információ</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/styleegyeniTema.css" />
  </head>
  <body >
  <?php
        session_start();
   ?>
  
    <!-- Csomagolas kezdete, ez fogja kozre az egesz oldalt -->
    <div class="wrapper">
      <!-- Kontener ami kozre fogja a felso reszt a kozepso sectionnal -->
      <!-- Csak a felso resz cim es menupontok -->
      <div class="top">
        <div class="cimlogin">
          <div class="cim">
          <h1>Egyéni téma Választása</h1>
         </div>
         <div class="login" >
           <?php
            //bejelentkezes ellenorzese
            if(!isset($_SESSION["user"])){
              echo '<a href="login.php">login</a>';
            }
            else {
              $nev = $_SESSION["user"];
              echo "<p>Bejelentkezve mint,<br> $nev</p><br><a href='logout.php' >Logout</a>";
            } 
         ?>
         </div>
        </div>
        <div class="menu">
        <!--Menupontok-->
        <ul>
          <li><a href="."> Főoldal</a></li>
          <li>
            <a href="zarovizsga.php" target="_self"
              >Szakdolgozat téma és tanár választás</a
            >
          </li>
          <li>
          <a href="kutatasiterv.php">Kutatási terv beküldése</a>
          </li>
          <li>
            <a href="szakdolgozat.php">Szakdolgozat elkészítése</a>
          </li>
          <li><a href="GYIK.php">GYIK</a></li>
          <li><a href="kapcsolat.php">Kapcsolat</a></li>
        </ul>
      </div>
      </div>
      
      <div class="kep-es-szoveg"> 
      <?php   
      $hostname = 'localhost';
      $user = 'root';
      $password = '';
      $dbname = 'szakdolgozatab';
      
      //kapcsolat létesítése
      $db =mysqli_connect($hostname, $user, $password, $dbname);
      $db = new mysqli($hostname, $user, $password, $dbname);

    
      $sql = "SELECT TanarEmail,Csaladnev,Keresztnev FROM tanar";
      $result = $db->query($sql);
      $select= '<select id="tanarSelect" name="Tanar">';
      while($row = $result->fetch_assoc()){
          $nev = $row['Csaladnev']." ".$row['Keresztnev'];
          $email = $row['TanarEmail']; 
        $select.='<option value="'.$email.'">'.$nev.'</option>';
      } 
      $select.='</select>';
      //tema form 
      echo'
        <div class="kep">
          <!--Ez a resz a pirossal kijelolt cucc-->
          <h1>Válassz egyéni témát!</h1>
          <form name="Idopont1" method="POST" action="" onsubmit="return checkCheckBoxes(this);" autocomplete="off">
          
          <span>Írd be az általad kiválasztott téma címét: </span>
          <input type="text" id="temaSelect" name="Tema" placeholder="Ide írd a téma címét!">
          <br>
          <span>Tanár:</span>
           '.$select.'
          <br>
             <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
             <label for="checkboxG1" class="css-label">Elfogadom a felhasználási feltételeket!</label>
          <br>
          <input id="submit" type="submit" value="Mentés" name="Mentés" >
        </form>
          <br>
          
        </div> 
        </div>'; 
        ?>
    </div>
<?php 
      
      if(isset($_POST["Tanar"]) && isset($_POST["Tema"]) ){
         $felhasznalo = $_SESSION["userid"];
         $tanar=$_POST["Tanar"];
         $tema=$_POST["Tema"];
         
         $sql2 = "UPDATE diak SET TanarEmail = '$tanar' WHERE CNP = '$felhasznalo'";
         $sql3 = "INSERT INTO `szakdolgozat` (`SzakdolgozatKod`, `Cim`, `Jegy`, `Tartalom`, `SzakdolgozatEv`, `KutatasiTerv`, `KutatasiTervJegy`, `TanarEmail`, `CNP`, `ElkeszitesiHatarido`) 
         VALUES (NULL, '$tema', NULL, NULL, '2020', NULL, NULL, '$tanar', '$felhasznalo', '2020-06-15');";
        //email felépítése
         $nev = $_SESSION["user"];
         $sql = "SELECT Email FROM diak WHERE CNP = '$felhasznalo'";
            $result1 = $db->query($sql);
            $row = $result1->fetch_assoc();
            if ($row['Email']){
            $to_email = $row['Email']; 
            }
          
         $sql = "SELECT Csaladnev,Keresztnev FROM tanar WHERE TanarEmail = '$tanar'";
             $result1 = $db->query($sql);
            $row = $result1->fetch_assoc();
              if ($row['Csaladnev'] && $row['Keresztnev']){
              $tanarNev = $row['Csaladnev']." ".$row['Keresztnev']; 
              }

             $subject = "Témavezető tanár és téma választás megerősése";
             $body = "Szép napot ".$nev." sikeresen kiválasztotta a témavezető tanárt és a témát.\nTémavezető tanár: ".$tanarNev.".\nVálasztott téma: ".$tema.".\nTovabbi információkért egyeztess a választott tanárral, E-mail címe: ".$tanar."\nTovábbi szép napot kíván az KGTK!";
             $headers = "From: proba3682@gmail.com";
 
          //Selectek lefuttatasa es email kuldese
        if ($db->query($sql2) === TRUE && $db->query($sql3) === TRUE && mail($to_email,$subject,$body, $headers)) {
         echo '<script language="javascript">';
         echo "alert('Sikeresen elmentettük a tanár és témaválasztásodat, megerősítő E-mailt küldtünk az E-mail címedre!')";
         echo '</script>';
         } else {
           echo '<script language="javascript">';
           echo "alert('Sikertelen a mentés')";
           echo '</script>';
          echo "Error updating record: " . $db->error;
         }
      }
      //átirányítás a főoldalra
      if (isset($_POST['Mentés']))
         {   
           ?>
       <script type="text/javascript">
       window.location = "index.php";
       </script>      
           <?php
         }
         ?>
 
            <script>
                  //checkbox és tanár ellenőrzés ellenorzes
                  function checkCheckBoxes(theForm) {
                   var e = document.getElementById("tanarSelect").value;
                   var f = document.getElementById("temaSelect").value;
                   if( f == ""){
                       alert("Nem írtad be a téma címet!");
                       return false;
                    } else if (e == "basic@yahoo.com" ) 
                   {
                     alert ('Nem választottál tanárt!');
                     return false;
                   } else if(theForm.checkboxG1.checked == false) { 	
                     alert ('Nem fogadtad el a felhasználási feltételeket!');
                     return false;
                   }
                   else 
                     return true;
                  }
        </script>           
        

      <!-- lablec -->
      <footer id="alja" class="grid">
        <div>További információért kattintson a linkre.</div>
        <div>
          <a id="footer1" href="http://hu.econ.ubbcluj.ro/" target="_blank"
            >&copy Közgazdaság- és Gazdálkodástudományi Magyar Intézet,
            Babeş–Bolyai Tudományegyetem, Kolozsvár</a
          >
        </div>
      </footer>
    </div>
    <!-- Wrapper vege -->
  </body>
</html>
