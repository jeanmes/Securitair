<html>
  <head>
    <title>Securit'Air</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/profil_modifiable.css" />
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
      <a href="mesure.html">Mesures</a>
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
    <div class="profil">
        <div class="part1">
            <h2>Profil</h2>
            <p>
                Vous pouvez consulter et modifier les données de votre profil
                <br />
            </p>
            <body>
            <?php
            session_start();
            $num = $_SESSION['identifiant'];
        try{
            //On se connecte à la BDD
            $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
        }
        catch(PDOException $e){
            echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
        }
        //SELECT type FROM `utilisateur` WHERE N°identification="22";
        $requete=$dbco->prepare("
        SELECT * FROM `profil` WHERE N°identification=$num");
        $requete->execute();
        $type = $requete->fetch();?>
        
                <img src="Ressources/impro.png" alt="Image de profil" />
                <form action="/Securit'Air 2/Model/modification.php" method="post" >
                <input type="text" name="nom" placeholder="nom" >
                <input type="text" name="prenom" placeholder="Prénom" />
                <input type="text" name="email" placeholder="Email" />
                <input type="text" name="téléphone" placeholder="Téléphone" />
                <input type="text" name="adresse" placeholder="Adresse" />
                <input type="text" name="centre" placeholder="Centre" />
                <button type="submit">Éditer le profil</button>
                </form>
        </div>
        <div class="part2">
       
        </div>
      </div>
  </body>

  <footer>
    <img src="Ressources/logo.png" alt="Logo" class="footer-logo" />
    <div class="cgu">
      <a href="faq.html" class="footer-cgu">FAQ</a>
      <a href="cgv.html" class="footer-cgu">Conditions générales de ventes</a>
      <a href="ml.html" class="footer-cgu">Mentions Légales</a>
      <a href="pc.html" class="footer-cgu">Politique de confidentialité</a>
    </div>
  </footer>
</html>
