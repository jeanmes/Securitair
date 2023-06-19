<?php
session_start();
$num = $_SESSION['identifiant'];
    $identification = $_POST["identifiant"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];
    $adresse=$_POST["adresse"];
    $centre=$_POST["centre"];
    $type=$_POST["type"];


    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    
    if ($nom!=NULL){
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE profil SET nom=:nom WHERE N°identification=$num");
        $sth->bindParam(':nom',$nom);
        $sth->execute();
    }
    if ($prenom!=NULL){
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE profil SET nom=:prenom WHERE N°identification=$num");
        $sth->bindParam(':prenom',$prenom);
        $sth->execute();
    }
    if ($email!=NULL){
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE profil SET email=:email WHERE N°identification=$num");
            $sth->bindParam(':email',$email);
        $sth->execute();
    }
    if ($telephone!=NULL){
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE profil SET telephone=:telephone WHERE N°identification=$num");
            $sth->bindParam(':telephone',$telephone);
        $sth->execute();
    }
    if ($adresse!=NULL){
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE profil SET adresse=:adresse WHERE N°identification=$num");
            $sth->bindParam(':adresse',$adresse);
        $sth->execute();
    }
    if ($centre!=NULL){
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE profil SET nom_centre_tri=:nom_centre_tri WHERE N°identification=$num");
            $sth->bindParam(':nom_centre_tri',$centre);
        $sth->execute();
    }
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
header("Location:/Securit'Air 2/Vues/profil.php");
exit;
    
// Assurez-vous que le code suivant ne s'exécute pas après la redirection
?>

