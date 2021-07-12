<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kapcsolat</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/stylekapcsolat.css" />
  </head>
  <body>
    <!-- Csomagolas kezdete, ez fogja kozre az egesz oldalt -->
    <div class="wrapper">
      <!-- Kontener ami kozre fogja a felso reszt a kozepso sectionnal -->
      <!-- Csak a felso resz cim es menupontok -->
      <div class="top">
        <div class="cimlogin">
          <div class="cim">
          <h1>Kapcsolat</h1>
         </div>
         <div class="login">
         <?php
          session_start();
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
          <?php
              
            if(isset($_SESSION["user"]) && $_SESSION["user"] == "Admin " ){
              echo '<div class="exists">
              <li>
              <a href="tablazat.php"  target="_self"
                >Szakdolgozat ellenörzés</a
              >
            </li>
            </div>';
            }
            else {
              
              echo'<li>
            <a href="zarovizsga.php" target="_self"
              >Szakdolgozat téma és tanár választás</a
            >
          </li><li>
          <a href="kutatasiterv.php">Kutatási terv beküldése</a>
          </li>';
            } 
         ?>
          <li>
            <a href="szakdolgozat.php">Szakdolgozat elkészítése</a>
          </li>
          <li><a href="GYIK.php">GYIK</a></li>
          <li><a href="kapcsolat.php">Kapcsolat</a></li>
        </ul>
      </div>
      </div>
      <!-- Kozepso szekson -->

      <div class="felsotomb">
        <h1>
          Kapcsolat felvételéért és további információkért kattintson az alábbi
          logókra
        </h1>
        <div class="kepekdiv">
          <a href="https://econ.ubbcluj.ro/" target="_blank">
            <div class="elsokocka"></div>
          </a>
          <a href="https://www.ubbcluj.ro/ro/" target="_blank">
            <div class="masodikkocka"></div>
          </a>
        </div>
      </div>

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
