<html>
  <head>
    <title>Securit'Air</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/profil.css" />
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
        $requete=$dbco->prepare("
        SELECT * FROM `profil` WHERE N°identification=$num");
        $requete->execute();
        $profil = $requete->fetch();?>
<p>Nom: <?php echo $profil["nom"];?></p>
<p>Prenom: <?php echo $profil["prenom"];?></p>
<p>Adresse: <?php echo $profil["adresse"];?></p>
<p>Telephone: <?php echo $profil["telephone"];?></p>
<p>Adresse mail: <?php echo $profil["email"];?></p>
<p>Centre de tri: <?php echo $profil["nom_centre_tri"];?></p>
<form action="profil_modifiable.php"><button type="submit">Modifier le profil</button></form>
        </div>
        <div class="part2">
            
          <?php session_start();?>
        <?php $type = $_SESSION['type'];?>
      <?php if($type==1): ?>
        <div class="recherche">
        <h4> Rechercher un profil</h4>
        <div class="search-bar">
        <form action="/Securit'Air 2/Model/recherche.php" method="post">
          
          <input type="text" placeholder="Recherche..." name="recherche" >
          <button type="submit">Rechercher</button>
          </form>
          </div>
        </div>
        <?php elseif ($type==2): ?>
          <h4> Rechercher un profil</h4>
          <div class="search-bar">
        <form action="/Securit'Air 2/Model/recherche.php" method="post">
          
          <input type="text" placeholder="Recherche..." name="recherche" >
          <button type="submit">Rechercher</button>
          </form>
        </div>
        <h4>Créer un nouveau profil</h4>
        <form action="creation.html">
          
        <button type="submit">Créer</button>
         </form>
         <h4> Supprimer un profil existant</h4>
        <form action="suppression.html">
       <button type="submit">Supprimer</button></a>
        </form>
        <form action="faq_modification.html">
       <button type="submit">modifier FAQ </button></a>
        </form>
        <?php endif; ?>
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
