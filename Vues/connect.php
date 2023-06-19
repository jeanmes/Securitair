<html>
  <head>
    <title>Securit'Air</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/connect.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="JS/connect.js"></script>
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

  <section class="connect">
      <div class="container">
        <div class="left">
            <h1><span class="orange">Connectez</span> vous</h1>
    </div>
    <div class="formulaire">
      <form action="/Securit'Air 2/Model/connexion.php" method="POST"  onsubmit="return validateForm();"> 
        <h3>Identifiant</h3>
        <input
          type="text"
          name="identifiant"
          placeholder="Entrez votre identifiant"
          required value="<?php if(isset($_COOKIE['identifiant'])){echo $_COOKIE['identifiant'];}?>"><p class="error"><?php if(isset($_GET["identifiant"]) && $_GET["identifiant"] === "true"){echo "Veuillez remplir votre identifiant";}?></p>
        

       
        <h3>Mot de passe</h3>
        <input
          type="password"
          name="mdp"
          placeholder="Entrez votre mot de passe"
          required
        />
          <div class="connectbutton"><button type="submit">Se connecter</button></div>
        </div>
      </form>
       <h2>Pas encore de compte ?</h2>
      <div class="inscrire">
        <button><a href="subscribe.php">S'inscrire</a></button>
        </div>
  </section>
  <script>
            function validateForm() {
                var email = document.getElementById('email').value;
                var atpos = email.indexOf('@');
                var dotpos = email.lastIndexOf('.');
        
                if (atpos < 1 || (dotpos - atpos < 2)) {
                    alert('Veuillez entrer une adresse e-mail valide');
                    document.getElementById('email').focus();
                    return false;
                }
                confirm("Voulez-ous vous connecter ?"); //lors de la soumission du formulaire la fonction formSubmit est appellée;
                // Le formulaire est valide
            }
        </script>
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
