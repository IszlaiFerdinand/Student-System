<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GYIK</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/styleGYIK.css" />
    <script
      type="text/javascript"
      src="//code.jquery.com/jquery-1.11.0.min.js"
    ></script>
  </head>
  <body>
    <!-- Csomagolas kezdete, ez fogja kozre az egesz oldalt -->
    <div class="wrapper">
      <!-- Kontener ami kozre fogja a felso reszt a kozepso sectionnal -->
      <!-- Csak a felso resz cim es menupontok -->
      <div class="top">
        <div class="cimlogin">
          <div class="cim">
          <h1>GYIK</h1>
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
        <h1></h1>

        <div class="faq_container">
          <div class="faq">
            <div class="faq_question"><span>   
              1.Melyek a legfontosabb dátumok, amelyekről tudnom kell?
            </div>
            <div class="faq_answer_container">
              <div class="faq_answer">A legfontosabb dátumok listája <a href="./datumok.html" target="_blank">ITT</a> tekinthető meg.   </div>
              
            </div>
          </div>
        </div>

        <div class="faq_container">
          <div class="faq">
            <div class="faq_question"><span>
              2. Milyen tematikák szükségesek a záróvizsgára GazdInfósoknak?
            </div>
            <div class="faq_answer_container">
              <div class="faq_answer">A GazdInfósok tematikái záróvizsgára <a href="https://drive.google.com/file/d/11t8jOxLcnho9rqhj0TfIHVI2P4disc6h/view" target="_blank">ITT</a> találhatóak meg. </div>
            </div>
          </div>
        </div>

        <div class="faq_container">
          <div class="faq">
            <div class="faq_question"><span>   
              3.Az idei záróvizsgák el lesznek halasztva a a járvány miatt vagy online fogják megoldani?
            </div>
            <div class="faq_answer_container">
              <div class="faq_answer">A záróvizsgák úgyanúgy meg lesznek tartva mint elöző években, annyi különbséggel, hogy komoly egészségügyi szabályozások lesznek alkalmazva.</div>
            </div>
          </div>
        </div>

        <div class="faq_container">
          <div class="faq">
            <div class="faq_question"><span>   
              4.Választhatom-e ugyanazt a tanárt a két témaválasztásnál?
            </div>
            <div class="faq_answer_container">
              <div class="faq_answer">Nem tanácsos ugyanazt a tanárt választani mivel ha elutasít nem lesz lehetőséged mást választani.</div>
            </div>
          </div>
        </div>

        <div class="faq_container">
          <div class="faq">
            <div class="faq_question"><span>   
              5.Mennyi idő szükséges a teljes szakdolgozat elkészítéséhez?
            </div>
            <div class="faq_answer_container">
              <div class="faq_answer">Ha megvan egy általános kép, és egy kezdetleges forma, akkor körülbelül 2 hét alatt el lehet készíteni a szakdolgozatot.</div>
            </div>
          </div>
        </div>

        <div class="faq_container">
          <div class="faq">
            <div class="faq_question"><span>   
              6.Melyek a legfontosabb formai követelmények a szakdolgozat megírásakor?
            </div>
            <div class="faq_answer_container">
              <div class="faq_answer">A legfontosabb formai követelmények: betűtípus Times New Roman, 1,5-ös sórköz.
              </div>
            </div>
          </div>
        </div>

      </div>

      <script>
        $(document).ready(function () {
          $(".faq_question").click(function () {
            if ($(this).parent().is(".open")) {
              $(this)
                .closest(".faq")
                .find(".faq_answer_container")
                .animate({ height: "0" }, 500);
              $(this).closest(".faq").removeClass("open");
            } else {
              var newHeight =
                $(this).closest(".faq").find(".faq_answer").height() + "px";
              $(this)
                .closest(".faq")
                .find(".faq_answer_container")
                .animate({ height: newHeight }, 500);
              $(this).closest(".faq").addClass("open");
            }
          });
        });
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
