<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FSEGA szakdolgozat információ</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/styleszakdolgozat.css" />
  </head>
  <body>
    <!-- Csomagolas kezdete, ez fogja kozre az egesz oldalt -->
    <div class="wrapper">
      <!-- Kontener ami kozre fogja a felso reszt a kozepso sectionnal -->
      <!-- Csak a felso resz cim es menupontok -->
      <div class="top">
        <div class="cimlogin">
          <div class="cim">
          <h1>Szakdolgozat elkészítése</h1>
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
      <div class="szoveg">
        <div class="felsotomb">
          <h1>
            Bevezető
          </h1>
          <p>
            Az alapképzés végén minden hallgatónak szakdolgozatot, a mesteri
            képzés végén pedig mesteri disszertációs dolgozatot kell készítenie
            abban az intézményben, ahol a tanulmányait folytatta.
          </p>
          <p>
            A dolgozat a szakképzettségnek megfelelő, a szakmai tárgyakhoz
            kapcsolódó témájú, amely a hallgató alapos tárgyi ismereteit
            bizonyítja, elkészítésével a hallgatónak tanúsítania kell, hogy
            tanulmányai során elsajátította a szakirodalmi áttekintés
            elkészítésének alapjait, valamint egy szakmai kérdés feldolgozása
            kapcsán képes saját önálló véleményét szabatosan és tömören
            megfogalmazni, és írásos formában dokumentálni, továbbá az
            államvizsga bizottság előtt szóbeli vitában sikeresen megvédeni.
          </p>
        </div>

        <div class="masodiktomb">
          <h1>
            A dolgozat struktúrájának meghatározása
          </h1>
          <p style="color: #ffba08; text-decoration: underline;">
            <b>
              A téma kiválasztása után a hallgató a témavezető segítségével
              meghatározza a dolgozat felépítését, amely a következő elemeket
              kell, hogy tartalmazza:</b
            >
          </p>
          <ul>
            <li>Tartalomjegyzék</li>
            <li>Bevezetés</li>
            <li>Szakirodalmi háttér bemutatása</li>
            <li>A kutatás célja és hipotézisek</li>
            <li>Módszertan és adatok</li>
            <li>Eredmények</li>
            <li>Következtetések</li>
            <li>Irodalomjegyzék</li>
            <li>Mellékletek</li>
          </ul>
          <p>
            Ez a struktúra egy általánosan javasolt struktúra, a dolgozat
            elkészítése során a vizsgált témának megfelelően változhat.
          </p>
        </div>

        <div class="harmadiktomb">
          <h1>
            A dolgozat leadása és a bemutatására vonatkozó tanácsok
          </h1>
          <p>
            A hallgatók tudományos kutatása egy dolgozat formájában
            konkretizálódik, amelyet a bizottságok megvitatnak és osztályoznak.
          </p>
          <p style="color: #ffba08; text-decoration: underline;">
            <b>A dolgozat leadásakor a következő lépések javasoltak:</b>
          </p>
          <ol>
            <li>A dolgozat szerkezetét a témavezető jóváhagyja</li>
            <li>
              A témavezető beleegyezése és aláírása után a dolgozat leadható az
              egyetem titkárságán
            </li>
            <li>
              A hallgató egy CD-n elektronikus formában is mellékeli a
              dolgozatot.
            </li>
          </ol>
          <p>
            A témavezetőnek joga van nem javasolni megvédésre azon dolgozatokat,
            amelyek nem felelnek meg a minimális szakmai és formai
            követelményeknek.
          </p>
          <p style="color: #ffba08; text-decoration: underline;">
            <b>A dolgozat bemutatásakor a következő eljárást kell követni:</b>
          </p>
          <ul>
            <li>
              A bizottság elnöke kérésére a hallgató bemutatja a dolgozatot
            </li>
            <li>A bemutatás időtartama általában 10 perc</li>
            <li>A bemutatás után kb. 5 percet szán a bizottság a kérdésekre</li>
            <li>A végleges jegyet a bizottság határozza meg</li>
          </ul>
          <p style="color: #ffba08; text-decoration: underline;">
            <b>
              A végleges jegy meghatározásánál a következőket veszi figyelembe a
              bizottság:</b
            >
          </p>
          <ol>
            <li>A dolgozat tudományos jellegét</li>
            <li>A dolgozat struktúráját</li>
            <li>A felhasznált szakirodalom jellegét</li>
            <li>A kutatás módszertanát</li>
            <li>A dolgozat bemutatását</li>
            <li>A feltett kérdések megválaszolását</li>
          </ol>
        </div>

        <div class="negyediktomb">
          <h1>
            A dolgozat értékelési szempontjai
          </h1>

          <ol>
            <li>Témaválasztás és bevezetés(10 pont)</li>
            <ul>
              <li>
                A hallgató indokolja a témaválasztását és a téma
                innovativitását?
              </li>
              <li>A hallgató meghatároz célkitűzéseket?</li>
              <li>
                A dolgozat felépítésének és kifejtésének bemutatása szerepel a
                bevezetésben?
              </li>
            </ul>

            <li>Elméleti felvezetés és bemutatás(20 pont)</li>
            <ul>
              <li>
                A felhasznált szakirodalom illeszkedik-e a feldolgozott témához?
                Aktuális? Megbízható?
              </li>
              <li>
                Milyen mértékben alkalmazza a hallgató a képzés során szerzett
                ismereteket? Mennyire merít az egyes tárgyak kapcsán
                feldolgozott kötelező irodalomból?
              </li>
              <li>
                A tananyagot milyen mértékben egészíti ki más, hazai vagy
                nemzetközi, releváns forrásokkal (szakkönyvek, tudományos
                cikkek, tanulmányok)?
              </li>
              <li>Megtalálható-e az elméletek szintetizálása?</li>
            </ul>

            <li>Módszertan(10 pont)</li>
            <ul>
              <li>
                A meghatározott célkitűzésekhez, valamint az elemezett
                problémához megfelelő módszereket alkalmaz-e a hallgató?
              </li>
              <li>
                A kiválasztott kutatásmódszertan összhangban áll a kiválasztott
                elméleti megközelítéssel?
              </li>
              <li>
                A módszertani megközelítés (kvantitatív vagy kvalitatív), a
                konkrét adatgyűjtési eszközök (pl. kérdőív, interjú), illetve az
                adatgyűjtés konkrét módjára vonatkozó információk
                (mintajellemzők, kérdőív kitöltésének és feldolgozásának módja,
                interjúkészítés) a megfelelő részletességgel van-e elmagyarázva?
              </li>
            </ul>
            <li>
              Gyakorlati rész felvezetése és bemutatása, az adatok elemzése(30
              pont)
            </li>
            <ul>
              <li>
                A gyakorlati rész milyen mértékben alapszik és épít az elméleti
                részre, szakirodalmi áttekintőre, az elméleti részben bemutatott
                elméletekre és módszerekre?
              </li>
              <li>
                Az adatgyűjtés és a feldolgozás igazodik-e az elméleti és
                módszertani részben megfogalmazott célkitűzésekhez?
              </li>
              <li>
                Az adatfeldolgozás szakszerű? Megbízható? Aktuális adatokat
                dolgoz fel? Helyes a módszertani feldolgozás?
              </li>
              <li>Mennyire teljes körű az elemzés?</li>
            </ul>
            <li>Eredmények, következtetések és javaslatok (20 pont)</li>
            <ul>
              <li>
                Milyen mértékben képes a hallgató összegezni és összefoglalni a
                célkitűzéseket és az eredményeket?
              </li>
              <li>Összhangban vannak az eredmények a célkitűzésekkel?</li>
              <li>
                Az eredmények úgy számszakilag, mint tartalmilag helytállóak?
              </li>
              <li>
                Tartalmaz a dolgozat újszerű eredményeket vagy megállapításokat?
              </li>
              <li>A következtetések és javaslatok helytállóak, aktuálisak?</li>
              <li>
                Tartalmaz a dolgozat kitekintést a további kapcsolódó témákra
                vagy elvégzendő elemzésekre?
              </li>
              <li>Megnevezi a hallgató a kutatás korlátait?</li>
            </ul>
            <li>Szerkezeti és formai követelmények (10 pont)</li>
            <ul>
              <li>
                Igazodik a dolgozat felépítése az Útmutató-ban előírt
                struktúrához?
              </li>
              <li>
                Az ábrák, grafikonok, táblázatok megfelelően vannak alkalmazva?
                Formailag (megnevezések, mértékegységek, forrás megjelölése)
                teljesek?
              </li>
              <li>
                Mennyire világos és érthető a dolgozat az olvasó számára
                (közérthetőség és követhetőség, nyelvhelyesség, gördülékeny
                fogalmazás, a szaknyelv következetes használata)?
              </li>
              <li>Megfelelő a szerkesztés, stílus és külalak?</li>
            </ul>
          </ol>
        </div>
        <div class="otodiktomb">
          <h1>
            Minden végzős hallgatónak kitartást és eredményes munkát kívánunk!
          </h1>
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
