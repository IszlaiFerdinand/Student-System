<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ >
    <title>Tanár- és Témaválasztás</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/stylezaro.css" />
  </head>
  <body onload='loadTanarok()'>
 
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
          <h1>Szakdolgozat téma és tanárválasztás</h1>
         </div>
         <div class="login">
         <?php
              
            if(!isset($_SESSION["user"])){
              echo '<a href="login.php">login</a>';
            }
            else {$nev = $_SESSION["user"];
              echo "<p>Bejelentkezve mint,<br> $nev</p><br><a href='logout.php' >Logout</a>";} 
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
      <!-- Kozepso szekson -->

      <!--Also ket kocka-->
      <div class="kep-es-szoveg">
      <?php
          if(isset($_SESSION["user"])){
            
             $hostname = 'localhost';
             $user = 'root';
             $password = '';
             $dbname = 'szakdolgozatab';
             
             //kapcsolat létesítése
             $db =mysqli_connect($hostname, $user, $password, $dbname);
             $db = new mysqli($hostname, $user, $password, $dbname);
             
             $felhasznalo = $_SESSION["userid"];
              //ellenorzes, hogy van-e mar valasztott tanara a diaknak
            $checkquery = "SELECT TanarEmail FROM diak WHERE CNP= '$felhasznalo' ";
            $result1 = $db->query($checkquery);
            $row = $result1->fetch_assoc();
             //while($row = $result1->fetch_assoc()){ 
             if ($row['TanarEmail'] == "basic@yahoo.com"){
               
            //Select parancs megirasa amivel lekerjuk a tanarok adatait
             $query = 'SELECT TanarEmail, Csaladnev, Keresztnev FROM tanar';
             $result = $db->query($query);
           
       
           
             //Tanarok asszociativ tömb feltöltése
             while($row = $result->fetch_assoc()){  //soronként beilleszti a visszateritett tábla értékeit a $rowba
               
               $tanarok[] = array("Email" => $row['TanarEmail'], "Csaladnev" => $row['Csaladnev'], "Keresztnev" => $row['Keresztnev']);
             }
             //Tanárok témáinak lekérése
             $query = "SELECT TemaKod, TanarEmail, Nev FROM tema";
             $result = $db->query($query);
           
             while($row = $result->fetch_assoc()){
               
               $temak[$row['TanarEmail']][] = array("TemaKod" => $row['TemaKod'], "Email" => $row['TanarEmail'], "Nev" => $row['Nev']);
             }
             //változók encode-olasa JSON be
             $jsonTanarok = json_encode($tanarok);
             $jsonTemak = json_encode($temak);  
             $valasztas = "egyeniTema.php";
           
             echo' <div class="kep">
           <!--Ez a resz a pirossal kijelolt cucc-->
           <h1>Válassz tanárt és témát!</h1>
           <form name="Idopont1" method="POST" action="" onsubmit="return checkCheckBoxes(this);" autocomplete="off">
           <span>Tanár:</span>
           <select id="tanarSelect" name="Tanar">
           </select>
           <br>
           <span>Téma:</span>
           <select id="temaSelect" name="Tema">
           </select>
             <br>
             <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
             <label for="checkboxG1" class="css-label">Elfogadom a felhasználási feltételeket!</label>
             <br>
             <input type="submit" name="Mentés" value="Mentés" id="submit" />
             <br><input type="button" name="Valasztas" value="Egyéni téma választás" id="choose" >
           </form>
         </div>
         
       </div>';
      
            }
            else {
              echo '<div class="kep"><h1>Már választottál tanárt és témát!</h1></div>';
            }
        }
          else echo '<div class="kep"><h1>Ezt a tartalmat csak bejelentkezett felhasznaló tekintheti meg!</h1></div>';
        ?>

     


      </div>

      <?php 
      //formbol kinyert adatok vizsgalata
     if(isset($_POST["Tanar"]) && isset($_POST["Tema"]) ){
        $felhasznalo = $_SESSION["userid"];
        $tanar=$_POST["Tanar"];
        $tema=$_POST["Tema"];
        $temaNev = "";
        $sql = "SELECT Nev from tema WHERE TemaKod = '$tema'";
        $result1 = $db->query($sql);
            $row = $result1->fetch_assoc();
            if ($row['Nev']){
            $temaNev = $row['Nev']; 
            }
        $sql2 = "UPDATE diak SET TanarEmail = '$tanar' WHERE CNP = '$felhasznalo'";
        $sql3 = "INSERT INTO `szakdolgozat` (`SzakdolgozatKod`, `Cim`, `Jegy`, `Tartalom`, `SzakdolgozatEv`, `KutatasiTerv`, `KutatasiTervJegy`, `TanarEmail`, `CNP`, `ElkeszitesiHatarido`) 
        VALUES (NULL, '$temaNev', NULL, NULL, '2020', NULL, NULL, '$tanar', '$felhasznalo', '2020-06-15');";
        //email felepitese
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
             $body = "Szép napot ".$nev." sikeresen kiválasztotta a témavezető tanárt és a témát.\nTémavezető tanár: ".$tanarNev.".\nVálasztott téma: ".$temaNev.".\nTovabbi információkért egyeztess a választott tanárral, E-mail címe: ".$tanar."\nTovábbi szép napot kíván az KGTK!";
             $headers = "From: proba3682@gmail.com";

              //queryk futtatasa es email elkuldese
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

      <script type='text/javascript'>
                document.getElementById("choose").onclick = function () {
                  location.href = "egyeniTema.php";
                };
        
                 //checkbox és tanár ellenőrzés ellenorzes
                 function checkCheckBoxes(theForm) {
                  var e = document.getElementById("tanarSelect").value;
                  if (e == "basic@yahoo.com" ) 
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

                 //php valtozok bevitele javascriptbe 
                 <?php
                   echo "var tanarok = $jsonTanarok; \n";
                   echo "var temak = $jsonTemak; \n";
                 ?>
                //valtozokat feldolgozo es kiiro fuggvenyek
                 function loadTanarok(){
                   var tanarSelect = document.getElementById("tanarSelect");
                   tanarSelect.onchange = loadTemak;
                   for(var i = 0; i < tanarok.length; i++){
                     
                     $teljesNev = tanarok[i].Csaladnev + " " + tanarok[i].Keresztnev;
                    
                     tanarSelect.options[i] = new Option($teljesNev, tanarok[i].Email,);          
                   }
                 }
           
                 function loadTemak(){
                   var tanarSelected = this;
                   var temaKod = this.value;
                   var temaSelect = document.getElementById("temaSelect");
                   temaSelect.options.length = 0; 
                   for(var i = 0; i < temak[temaKod].length; i++){
                     temaSelect.options[i] = new Option(temak[temaKod][i].Nev,temak[temaKod][i].TemaKod);
                   }
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
