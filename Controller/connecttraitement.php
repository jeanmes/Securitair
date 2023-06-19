<?php
//  code PHP qui permet de récupérer dans des variables les données qui viennent du formulaire
$identifiant = $_POST['identifiant']; // récupère la valeur du champ nom du formulaire et l'assigne à la variable $nom (valeur par défaut chaine vide '')
$email = $_POST["e-mail"];

// code PHP qui vérifie si les champs prénom et nom sont remplis
if (empty($identifiant) || empty($email) ){
    echo "Tous les champs doivent être remplis";
        if(empty($identifiant)){
            $errMessageIdentifiant = "true";
        } else {
            $errMessageIdentifiant = "false";
            setcookie("identifiant", $identifiant); //cookie
        }
        if(empty($email)){
            $errMessageEmail = "true";
        } else {
            $errMessageEmail = "false";
            setcookie("email", $email);
        }
    
       //redirection vers index.php :
        header("Location: connect.php?identifiant=" . urlencode($errMessageIdentifiant) . "&email=" . urlencode($errMessageEmail));
       //La redirection vers la page de connexion avec les valeurs des variables d'erreur dans l'URL permet à la page suivante de récupérer ces informations et d'afficher des messages d'erreur appropriés à côté des champs vides dans le formulaire
    } else {
        header("Location: accueilconnecter.html?identifiant=" . urlencode($errMessageIdentifiant) . "&email=" . urlencode($errMessageEmail));
    }

