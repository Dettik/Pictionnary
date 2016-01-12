<?php require('header.php');?>

<div class="container">
    <?php

    if(isset($_SESSION["id"])){
        ?>
        <div class="jumbotron">
            <h2>Bienvenue <?php echo $_SESSION["prenom"] . " " . $_SESSION['nom']?></h2>

            <a class="btn btn-primary" role="button" href="#"> Dessiner >></a>
            <a class="btn btn-primary" role="button" href="#"> Voir mes dessins >></a>
        </div>

        <?php
    } else {
        ?>
        <div class="jumbotron">
            <h2>Bienvenue sur le site Pictionnary</h2>

            <a class="btn btn-primary" role="button" href="inscription.php"> Inscrivez-vous >></a>
            <a class="btn btn-primary" role="button" href="connexion.php"> Connectez-vous >></a>
        </div>
        <?php
    }
    ?>
</div>
</body>
