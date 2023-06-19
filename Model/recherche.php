<?php
session_start();
       $recherche = $_POST["recherche"];
       $_SESSION['recherche'] = $recherche;
        header("Location:/Securit'Air 2/Vues/modif_capteur.php")
    ?>

