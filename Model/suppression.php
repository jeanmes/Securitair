<?php

    $identification = $_POST["identifiant"];
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    
    
        //On insère les données reçues
        $sth = $dbco->prepare("
        DELETE FROM profil WHERE N°identification =:identification");
        
        $sth->bindParam(':identification',$identification);
        $sth->execute();

        $sth = $dbco->prepare("
        DELETE FROM utilisateur WHERE N°identification =:identification");
        
        $sth->bindParam(':identification',$identification);
        $sth->execute();
        header("Location:/Securit'Air 2/Vues/profil.php");
    }
    
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
echo "Le profil a été supprimé"
    
// Assurez-vous que le code suivant ne s'exécute pas après la redirection
?>