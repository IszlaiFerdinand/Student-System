<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kutatási terv feltöltés</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/stylefeltoltes.css" />
  </head>
  <body>
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
          <h1>Kutatási terv feltöltése</h1>
         </div>
         <div class="login">
         <?php
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
            <a href="zarovizsga.php">Szakdolgozat téma és tanár választás</a>
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
             
             if ($row['TanarEmail'] == "basic@yahoo.com"){
              echo '<div class="kep"><h1>Elöbb válassz témavezető tanárt és témát!</h1></div>';
             }
              else{
                $sql = "SELECT KutatasiTerv FROM szakdolgozat WHERE CNP = '$felhasznalo'";
                $result1 = $db->query($sql);
                $row = $result1->fetch_assoc();
                if($row['KutatasiTerv'] == NULL){
                  //Az az eset amikor még nincs feltöltve kutatási terv
                  echo'
                    <div class="kep">
                      <!--Ez a resz a pirossal kijelolt cucc-->
                      <h1>Töltsd fel a kutatási tervet!</h1>
                      <form action="upload.php" onsubmit="return Validate(this);" method="post" enctype="multipart/form-data">
                      <label id="label">Válaszd ki a kutatási tervet:</label>
                      <input type="file" name="file" id="file">
                      <br>
                      <input id="submit" type="submit" value="Feltöltés" name="submit">
                    </form>
                      <br>
                      
                    </div>
                        </form>
                      </form>
                    </div>
                    
                  </div>';
                }
                else{
                  //Az az eset amikor már van feltöltve kutatási terv
                  echo'
                    <div class="kep">
                      <!--Ez a resz a pirossal kijelolt cucc-->
                      <h1>Már feltöltöttél egy kutatási tervet, ezzel a feltöltéssel felülírod az előzőt!</h1>
                      <form action="upload.php" onsubmit="return Validate(this);" method="post" enctype="multipart/form-data">
                      <label id="label">Válaszd ki a frissített kutatási tervet:</label>
                      <input type="file" name="file" id="file">
                      <br>
                      <input id="submit" type="submit" value="Feltöltés" name="submit">
                    </form>
                      <br>
                      
                    </div>
                        </form>
                      </form>
                    </div>
                    
                  </div>';
                }
      }
          }
          else echo '<div class="kep"><h1>Ezt a tartalmat csak bejelentkezett felhasznaló tekintheti meg!</h1></div>';
        ?>
      
      
      <script type="text/javascript"> 
      //Validáló függvény, ellenörzi az extentiont, ha nem megfelelő nem engedi feltölteni a filet.
        var _validFileExtensions = [".doc", ".docx", ".pdf"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Az általad feltöltött file nem megfelelő típusú, az elfogadott típusok: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
    } 
</script> 
      


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
