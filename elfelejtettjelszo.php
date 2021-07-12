<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FSEGA szakdolgozat információ</title>
    <link rel="icon" href="./img/university_icon-icons.com_49967.ico" />
    <link rel="stylesheet" href="./CSS/stylelogin.css" />
  </head>
  <body>
    <!-- Csomagolas kezdete, ez fogja kozre az egesz oldalt -->
    <div class="wrapper">
      <!-- Kontener ami kozre fogja a felso reszt a kozepso sectionnal -->
      <!-- Csak a felso resz cim es menupontok -->
      <div class="top">
        <h1>Elfelejtett jelszó</h1>
      </div>
      <!-- Kozepso szekson -->

      <!-- form a jelszoresethez -->
      <div class="felsotomb">
      <form class="box" action="elfelejtettjelszo1.php" method="post" autocomplete="off">
        <h1>Jelszó ujragenerálása</h1>
          <input type="text" placeholder="Írd be a CNP-det" name="CNP" required>        
          <input type="text" placeholder="Írd be a e-mail címed" name="e-mail" required>
          <input type="text" placeholder="Írd be a matricol számodat" name="matricol" required>
          <input type="submit" name="" value="Új jelszó küldése az e-mail címre">
          
    
 
</form>
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
