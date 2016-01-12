<?php
    require('header.php');

    $email = stripslashes($_POST['email']);
    $password=stripslashes($_POST['mdp']);
    $password = hash('sha256',$password);
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');
        $sql = $dbh->query("SELECT * FROM USERS WHERE email like '" . $email . "' AND password like '" . $password . "'");

        if ($sql->rowCount()>0) {
            while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION["id"] = $data["id"];
                $_SESSION["email"] = $data["email"];
                $_SESSION["password"] = $password;
                $_SESSION["nom"] = $data["nom"];
                $_SESSION["prenom"] = $data["prenom"];
                $_SESSION["tel"] = $data["tel"];
                $_SESSION["birthdate"] = $data["birthdate"];
                $_SESSION["couleur"] = $data["couleur"];
                $_SESSION["profilepic"] = $data["profilepic"];
            }

            header("Location: main.php");
        } else {
            header("Location: connexion.php?"
                    ."&erreur=".urlencode("Email ou mot de passe incorrect"));
        }

    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        $dbh = null;
        die();
    }

?>