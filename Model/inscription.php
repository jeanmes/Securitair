<?php

    $identification = $_POST["identifiant"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO inscription(N°identification,nom,prenom,email,password)
            VALUES( :identification, :nom, :prenom, :email, :password)");
        
        $sth->bindParam(':identification',$identification);
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':email',$email);
        $sth->bindParam(':password',$password);
        $sth->execute();
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
    header("Location:/Securit'Air 2/Vues/subscribe.php");

// Assurez-vous que le code suivant ne s'exécute pas après la redirection
exit;
?>