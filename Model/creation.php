<?php

    $identification = $_POST["identifiant"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $email=$_POST["email"];
    $telephone=$_POST["telephone"];
    $adresse=$_POST["adresse"];
    $centre=$_POST["nom_centre_tri"];
    $type=$_POST["type"];
    $password=$_POST["password"];
    $num=$_POST["num"];


    try{
        //On se connecte à la BDD
        $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
    
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO profil(N°identification,nom,prenom,adresse,telephone,email,nom_centre_tri,password,Id_Centre)
            VALUES( :identification, :nom, :prenom, :adresse, :telephone, :email, :nom_centre_tri, :password, :Id_Centre)");
        
        $sth->bindParam(':identification',$identification);
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':adresse',$adresse);
        $sth->bindParam(':telephone',$telephone);
        $sth->bindParam(':email',$email);
        $sth->bindParam(':nom_centre_tri',$centre);
        $sth->bindParam(':password',$password);
        $sth->bindParam(':Id_Centre',$num);
        $sth->execute();

       $sth = $dbco->prepare("
            INSERT INTO utilisateur(N°identification,type) VALUES( :identification, :type)");
        
        $sth->bindParam(':identification',$identification);
        $sth->bindParam(':type',$type);
        $sth->execute();
        header("Location:/Securit'Air 2/Vues/profil.php");
    }


catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
} 
// Assurez-vous que le code suivant ne s'exécute pas après la redirection
