    <?php
    session_start();

        $identification = $_POST["identifiant"];
        $password = $_POST["mdp"];
        
        try{
            //On se connecte à la BDD
            $dbco = new PDO('mysql:host=localhost:8889;dbname=Securitair;charset=utf8', 'root', 'root');
            
            $requete=$dbco->prepare("
            SELECT password FROM `profil` WHERE N°identification=:identification");
            $requete->bindParam(':identification',$identification);
            $requete->execute();
            $test = $requete->fetch();
           
      
        if ($test["password"]==$password){
            //On insère les données reçues
            $sth = $dbco->prepare("
                INSERT INTO connexion(N°identification,password)
                VALUES(:identification, :password)");
            $sth->bindParam(':identification',$identification);
            $sth->bindParam(':password',$password);
            $sth->execute();
        
       
        //SELECT type FROM `utilisateur` WHERE N°identification="22";
        $requete=$dbco->prepare("
        SELECT type FROM `utilisateur` WHERE N°identification=:identification");
        $requete->bindParam(':identification',$identification);
        $requete->execute();
        $type = $requete->fetch();
        $variable=NULL;
        $requete=$dbco->prepare("
        SELECT Id_Centre FROM profil WHERE N°identification=:identification");
        $requete->bindParam(':identification',$identification);
        $requete->execute();
        $centre = $requete->fetch();
        
        if($type["type"]=="utilisateur"){
        $variable=0;
        }
        elseif ($type["type"]=="administrateur") {
         $variable=2;
}
        elseif ($type["type"]=="responsable") {
          $variable=1;
}

$_SESSION['type'] = $variable;
$_SESSION['identifiant']=$identification;
$_SESSION['centre']=$centre['Id_Centre'];
header("Location:/Securit'Air 2/Vues/accueilconnecter.html");
}
        else {
            header("Location:/Securit'Air 2/Vues/connect.php");
}
        }
    

catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
//header("Location:/Securit'Air 2/Vues/connect.php");
// Assurez-vous que le code suivant ne s'exécute pas après la redirection
exit;
?>
