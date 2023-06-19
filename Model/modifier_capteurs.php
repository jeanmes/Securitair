<?php
session_start();
            $num = $_SESSION['centre'];
    $seuilcardiaque=$_POST["seuil1"];
    $seuilsonore=$_POST["seuil2"];
    $seuilC02=$_POST["seuil3"];
    $seuiltemperature=$_POST["seuil4"];

    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE capteurs SET seuil=:seuil  WHERE (id_Capteur=$num AND type='capteur cardiaque')");
        $sth->bindParam(':seuil',$seuilcardiaque);
        $sth->execute();
    
       
            //On insère les données reçues
            $sth = $dbco->prepare("
                UPDATE capteurs SET seuil=:seuil  WHERE (Id_Capteur=$num AND type='capteur sonore')");
            $sth->bindParam(':seuil',$seuilsonore);
            $sth->execute();

            $sth = $dbco->prepare("
                UPDATE capteurs SET seuil=:seuil  WHERE (Id_Capteur=$num AND type='capteur C02') ");
            $sth->bindParam(':seuil',$seuilC02);
            $sth->execute();
            $sth = $dbco->prepare("
            UPDATE capteurs SET seuil=:seuil  WHERE (Id_Capteur=$num AND type='capteur temperature') ");
        $sth->bindParam(':seuil',$seuiltemperature);
        $sth->execute();
        
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
header("Location:/Securit'Air 2/Vues/accueilconnecter.html");
exit;

    
// Assurez-vous que le code suivant ne s'exécute pas après la redirection
?>