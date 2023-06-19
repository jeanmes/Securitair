<?php
session_start();
    $numero=$_POST["numero"];
    $question=$_POST["question"];
    $reponse=$_POST["reponse"];
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE faq SET question=:question  WHERE numero=$numero");
        $sth->bindParam(':question',$question);
        $sth->execute();
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            UPDATE faq SET reponse=:reponse WHERE numero=$numero");
        $sth->bindParam(':reponse',$reponse);
        $sth->execute();
    
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
header("Location:/Securit'Air 2/Vues/accueilconnecter.html");
exit;
    
// Assurez-vous que le code suivant ne s'exécute pas après la redirection
?>

