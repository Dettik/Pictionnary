<?php

$email=stripslashes($_POST['email']);
$password=stripslashes($_POST['mdp']);
$nom=stripslashes($_POST['nom']);
$prenom=stripslashes($_POST['prenom']);
$tel=stripslashes($_POST['telephone']);
$website=stripslashes($_POST['web']);
$sexe='';
if (array_key_exists('sexe',$_POST)) {
    $sexe=stripslashes($_POST['sexe']);
}
$birthdate=stripslashes($_POST['datenaissance']);
$ville=stripslashes($_POST['ville']);
$taille=stripslashes($_POST['taille']);
$couleur=stripslashes($_POST['couleur']);
$profilepic=stripslashes($_POST['profilepic']);

try {

    $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');

    $sql = $dbh->query("SELECT * FROM USERS WHERE email like '" . $email . "'");
    if ($sql->rowCount()>0) {
        header("Location: inscription.php?"
            ."nom=".urlencode($nom)."&prenom=".urlencode($prenom)."&tel=".urlencode($tel)
            ."&website=".urlencode($website)."&sexe=".urlencode($sexe)."&anniv=".urlencode($birthdate)
            ."&ville=".urlencode($ville)."&taille=".urlencode($taille)."&couleur=".urlencode($couleur)
            ."&erreur=".urlencode("Adresse mail déjà utilisée"));
        exit();
    }
    else {
        $sql = $dbh->prepare("INSERT INTO users (email, password, nom, prenom, tel, website, sexe, birthdate, ville, taille, couleur, profilepic) "
            . "VALUES (:email, :password, :nom, :prenom, :tel, :website, :sexe, :birthdate, :ville, :taille, :couleur, :profilepic)");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":password", hash('sha256',$password));
        $sql->bindValue(":nom", (empty($nom)?null:$nom));
        $sql->bindValue(":prenom", (empty($prenom)?null:$prenom));
        $sql->bindValue(":tel", (empty($tel)?null:$tel));
        $sql->bindValue(":website", (empty($website)?null:$website));
        $sql->bindValue(":sexe", $sexe);
        $sql->bindValue(":birthdate", (empty($birthdate)?null:date("Y-m-d", strtotime($birthdate))));
        $sql->bindValue(":ville", (empty($ville)?null:$ville));
        $sql->bindValue(":taille", (empty($taille)?null:$taille));
        $sql->bindValue(":couleur", $couleur);
        $sql->bindValue(":profilepic", (empty($profilepic)?null:$profilepic));

        if (!$sql->execute()) {
            echo "PDO::errorInfo():<br/>";
            $err = $sql->errorInfo();
            print_r($err);
        } else {

            $sql = $dbh->query("SELECT u.id, u.email, u.nom, u.prenom, u.couleur, u.profilepic FROM USERS u WHERE u.email='".$email."'");
            if ($sql->rowCount()<1) {
                header("Location: inscription.php?erreur=".urlencode("un problème est survenu"));
            }
            else {
                header("Location: connexion.php");
            }
        }
        $dbh = null;
    }
    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}
?>