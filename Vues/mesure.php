<html>
  <head>
    <title>Securit'Air</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/mesure.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700&display=swap"
      rel="stylesheet"
    />
  </head>

  <div class="header">
    <a href="accueilconnecter.html" class="logo">
      <img
        src="Ressources/logojr2.png"
        alt="Logo"
        width="110"
        height="auto"
      />
    </a>
    <div class="header-center">
      <a href="accueilconnecter.html">Accueil</a>
      <a href="profil.php">Profil</a>
      <a href="mesure.php">Mesures</a>
      <a href="messagerie.html">Messagerie</a>
    </div>
    <a href="accueil.html">Se déconnecter</a>
    <div class="header-right">
      <a href="profil.php" class="logo">
        <img
          src="Ressources/profiljr.png"
          alt="Logo"
          width="50"
          height="auto"
        />
      </a>
    </div>
  </div>

  <body>
    <div class="mesures">
      <h2>Mesures</h2>
      <p>
        Vous pouvez consulter les données récupérées par les boitiers
        Sécurit'Air dans votre centre de tri
        <br />
      </p>
      <div class="img">
      <img src="Ressources/carjr.png" alt="Logo" class="carjr" />
      <img src="Ressources/tempjr.png" alt="Logo" class="tempjr" /></div>

      <h4> Télecharger vos relevées</h4><button type="submit">Télécharger</button></a>
      </div>
      <form action="/Securit'Air 2/Model/modifier_capteurs.php" method="post" > 
      <?php session_start();?>
    <?php $type = $_SESSION['type'];?>
    <?php if($type==1): ?>
    <?php
    $centre = $_SESSION['centre'];
   
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
    //SELECT type FROM `utilisateur` WHERE N°identification="22";
    $requete=$dbco->prepare("
    SELECT * FROM `capteurs` WHERE (Id_Capteur=$centre AND type='capteur cardiaque') ");
    $requete->execute();
    $type = $requete->fetch();?>
    
    <p id="value1">Seuil capteur cardiaque: <?php echo $type["seuil"];?></p>
    <input type="range" id="slider1" name="seuil1" min="0" max="200" value=<?php echo $type["seuil"];?>>

<?php
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
    //SELECT type FROM `utilisateur` WHERE N°identification="22";
    $requete=$dbco->prepare("
    SELECT * FROM `capteurs` WHERE (Id_Capteur=$centre AND type='capteur sonore') ");
    $requete->execute();
    $type = $requete->fetch();?>
    
    <p id="value2">Seuil capteur sonore: <?php echo $type["seuil"];?></p>
    <input type="range" id="slider2" name="seuil2" min="0" max="120" value=<?php echo $type["seuil"];?>>


<?php
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
    //SELECT type FROM `utilisateur` WHERE N°identification="22";
    $requete=$dbco->prepare("
    SELECT * FROM `capteurs` WHERE (Id_Capteur=$centre AND type='capteur C02') ");
    $requete->execute();
    $type = $requete->fetch();?>
    
    <p id="value3">Seuil capteur C02: <?php echo $type["seuil"];?></p>
    <input type="range" id="slider3" name="seuil3" min="0" max="100" value=<?php echo $type["seuil"];?>>

    <?php
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
    //SELECT type FROM `utilisateur` WHERE N°identification="22";
    $requete=$dbco->prepare("
    SELECT * FROM `capteurs` WHERE (Id_Capteur=$centre AND type='capteur temperature') ");
    $requete->execute();
    $type = $requete->fetch();?>
    
    <p id="value4">Seuil capteur temperature: <?php echo $type["seuil"];?></p>
    <input type="range" id="slider4" name="seuil4" min="0" max="100" value=<?php echo $type["seuil"];?>>
<script>
function updateValue(sliderId, valueId) {
var slider = document.getElementById(sliderId);
var valueElement = document.getElementById(valueId);

// Met à jour la valeur affichée en temps réel
slider.addEventListener("input", function() {
  var value = slider.value;
  valueElement.textContent =value;
});
}

// Appeler la fonction pour chaque curseur
updateValue("slider1", "value1");
updateValue("slider2", "value2");
updateValue("slider3", "value3");
updateValue("slider4", "value4");
</script>

<div class="zut"><button type="submit" >Modifier les seuils</button></div>

  </form>
  <?php endif; ?>
  </body>

  <footer>
    <img src="Ressources/logo.png" alt="Logo" class="footer-logo" />
    <div class="cgu">
      <a href="faq.php" class="footer-cgu">FAQ</a>
      <a href="cgv.html" class="footer-cgu">Conditions générales de ventes</a>
      <a href="ml.html" class="footer-cgu">Mentions Légales</a>
      <a href="pc.html" class="footer-cgu">Politique de confidentialité</a>
    </div>
  </footer>
</html>
