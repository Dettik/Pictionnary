<?php require('header.php');

?>

<div class="container">
    <div class="jumbotron">

        <?php if(!empty($_GET['erreur'])) { echo "<div class='alert alert-danger'>" . $_GET['erreur'] . "</div>" ;}?>
        <h2>Connectez-vous</h2>
        <form action="req_connexion.php" method="POST" name="connexion" id="connexion">
            <div>
                <div class="form-group">
                    <label for="email">E-mail : </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@something.com" autofocus required />
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe : </label>
                    <input type="password" pattern="^[a-zA-Z0-9]{4,8}$" name="mdp" id="mdp" class="form-control" required/>
                </div>

                <input class="btn btn-primary" type="submit" value="Connexion >>">
            </div>
        </form>
    </div>
</div>


</body>