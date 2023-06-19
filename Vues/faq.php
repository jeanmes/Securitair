<html>
  <head>
    <title>Securit'Air</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="CSS/faq.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700&display=swap"
      rel="stylesheet"
    />
  </head>

  <div class="header">
    <a href="accueil.html" class="logo">
      <img
        src="Ressources/logo.png"
        alt="Logo"
        width="300"
        height="auto"
      />
    </a>
    <div class="header-center">
      <a href="accueil.html">Accueil</a>
      <div class="dropdown">
        <a class="dropbtn">A propos</a>
        <div class="dropdown-content">
          <a href="qsn.html">Qui sommes nous</a>
          <a href="produit.html">Notre produit</a>
        </div>
      </div>
      <a href="contact.html">Nous contacter</a>
    </div>
    <div class="header-right">
      <a href="subscribe.php">S'inscrire</a>
      <a class="btn" href="connect.php">Se connecter</a>
    </div>
  </div>

  <body>
    <h1><p>Foire aux questions (FAQ)</p></h1>
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
        SELECT * FROM `faq` WHERE numero=1");
        $requete->execute();
        $type = $requete->fetch();?>
        
       
    


    <div class="question"><?php echo $type["question"];?></div>
    <div class="answer">
      <?php echo $type["reponse"]; ?>
    </div>
    <hr class="hr-line" />
<?php $requete=$dbco->prepare("
        SELECT * FROM `faq` WHERE numero=2");
        $requete->execute();
        $type = $requete->fetch();?>
    <div class="question">
    <?php echo $type["question"];?>
    </div>
    <div class="answer">
    <?php echo $type["reponse"]; ?>
    </div>
    <hr class="hr-line" />

    <?php $requete=$dbco->prepare("
        SELECT * FROM `faq` WHERE numero=3");
        $requete->execute();
        $type = $requete->fetch();?>
    <div class="question">
    <?php echo $type["question"];?>
    </div>
    <div class="answer">
    <?php echo $type["reponse"]; ?>
    </div>
    <hr class="hr-line" />

    <?php $requete=$dbco->prepare("
        SELECT * FROM `faq` WHERE numero=4");
        $requete->execute();
        $type = $requete->fetch();?>
    <div class="question">
    <?php echo $type["question"];?>
    </div>
    <div class="answer">
    <?php echo $type["reponse"]; ?>
    </div>
    <hr class="hr-line" />

    <?php $requete=$dbco->prepare("
        SELECT * FROM `faq` WHERE numero=5");
        $requete->execute();
        $type = $requete->fetch();?>
    <div class="question">
    <?php echo $type["question"];?>
    </div>
    <div class="answer">
    <?php echo $type["reponse"]; ?>
    </div>
    <hr class="hr-line" />

    <script>
      // Ajouter un gestionnaire d'événement aux questions pour afficher/cacher les réponses
      var questions = document.querySelectorAll(".question");
      for (var i = 0; i < questions.length; i++) {
        questions[i].addEventListener("click", function () {
          var answer = this.nextElementSibling;
          if (answer.style.display === "block") {
            answer.style.display = "none";
          } else {
            answer.style.display = "block";
          }
        });
      }
    </script>
  </body>

  <footer>
    <div class="footer-left">
      <a href="faq.php" class="faq">Vous pouvez aussi regarder notre FAQ</a>

      <div class="contacter">
        <a href="contact.html" class="button">Nous contacter</a>
        <i href="https://www.facebook.com/securitair"
          ><img src="Ressources/i.png" class="insta"
        /></i>
        <i href="https://www.instagram.com/secur_itairparis/"
          ><img src="Ressources/f.png" class="facebook"
        /></i>
      </div>
    </div>
    <img src="Ressources/logo.png" alt="Logo" class="footer-logo" />
    <div class="cgu">
      <a href="cgv.html" class="footer-cgu">Conditions générales de ventes</a>
      <a href="ml.html" class="footer-cgu">Mentions Légales</a>
      <a href="pc.html" class="footer-cgu">Politique de confidentialité</a>
    </div>
  </footer>
</html>
