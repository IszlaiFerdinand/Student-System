<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FSEGA szakdolgozat információ</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/style.css" />
  </head>
  <body>
    

    
    <!-- Csomagolas kezdete, ez fogja kozre az egesz oldalt -->
    <div class="wrapper">
      <!-- Kontener ami kozre fogja a felso reszt a kozepso sectionnal -->
      <!-- Csak a felso resz cim es menupontok -->
      <div class="top">
        <div class="cimlogin">
          <div class="cim">
          <h1>Üdvözöllek a BBTE KGTK oldalán végzősöknek</h1>
         </div>
         <div class="login">
           <?php
              session_start();
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
          <li><a href="gyik.php">GYIK</a></li>
          <li><a href="kapcsolat.php">Kapcsolat</a></li>
        </ul>
      </div>
    </div>
      <!-- Kozepso szekson -->
      <div class="kep-es-szoveg">
        <div class="kep">
          <div class="vissza">
            <p>A júniusi záróvizsgáig fennmaradt idő <br />(Június 29.) :</p>
            <div id="visszaszamlalo">
              <script>
                //Visszaszamlalasi ido beallitasa junius 29-re
                var idopont = new Date("December 31., 2020 00:00:00").getTime();

                //Minden masodpercben frissitse magat
                var x = setInterval(function () {
                  //Jelenlegi datum megadasa
                  var most = new Date().getTime();

                  //Mostantol az adott idopontig az idotav kiszamitasa
                  var idotav = idopont - most;

                  //nap ora perc masodperc kiszamitasa
                  var nap = Math.floor(idotav / (1000 * 60 * 60 * 24));
                  var ora = Math.floor(
                    (idotav % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                  );
                  var perc = Math.floor(
                    (idotav % (1000 * 60 * 60)) / (1000 * 60)
                  );
                  var mp = Math.floor((idotav % (1000 * 60)) / 1000);

                  //Olyan helyre kiiratni, amelynek az idje "visszaszamlalo"
                  document.getElementById("visszaszamlalo").innerHTML =
                    nap +
                    " nap " +
                    ora +
                    " óra " +
                    perc +
                    " perc " +
                    mp +
                    " másodperc ";

                  // Ha lejar a visszaszamlalo kiirja az uzenetet
                  if (idotav < 0) {
                    clearInterval(x);
                    document.getElementById("visszaszamlalo").innerHTML =
                      "LEJÁRT AZ IDŐ";
                  }
                }, 1000);
              </script>
            </div>
          </div>
          <!--Ez a resz a pirossal kijelolt cucc-->
        </div>
        <div class="szoveg">
          <h1>Általános információk.</h1>
          <p>
            A Babeş-Bolyai Tudományegyetem Közgazdaság- és Gazdálkodástudományi
            Kar a 2000-2001-es tanévtől kezdődően biztosít magyar nyelvű
            közgazdász képzést. A szervezetileg is különálló Közgazdaság- és
            Gazdálkodástudományi Magyar Intézet 2011 októberében jött létre 21
            főállású oktatóval.
          </p>
          <p>
            Alapképzésen négy szakirányon kezdhetik meg tanulmányaikat a
            hallgatók: Gazdasági informatika, Marketing, Menedzsment valamint
            Pénzügy és bank. Az érdeklődőknek három magyar nyelvű közgazdasági
            mesteri képzést biztosítunk: Marketing stratégiák és politikák,
            Vállalati pénzügyi menedzsment, Vállalkozásmenedzsment. Intézetünk
            távoktatásos képzést is nyújt.
          </p>
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
