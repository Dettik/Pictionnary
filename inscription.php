<?php require('header.php');

?>

<div class="container">
    <div class="jumbotron">
    <h2>Inscrivez-vous</h2>
    <form class="inscription" action="req_inscription.php" method="post" name="inscription">
        <!-- c'est quoi les attributs action et method ? -->
        <!-- qu'y a-t-il d'autre comme possiblité que post pour l'attribut method ? -->
        <div class="alert alert-info">Les champs obligatoires sont indiqués par *</div>
        <?php if(!empty($_GET['erreur'])) { echo "<div class='alert alert-danger'>" . $_GET['erreur'] . "</div>" ;}?>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-mail : *</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@something.com" autofocus required
                           value="<?php if(!empty($_GET['email'])) { echo htmlspecialchars($_GET['email']); } ?>"/>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe : *</label>
                    <input type="password" pattern="^[a-zA-Z0-9]{4,8}$" name="mdp" id="mdp" class="form-control" required placeholder="Doit contenir de 4 à 8 caractères"/>
                </div>
                <div class="form-group">
                    <label for="mdpconfirm">Confirmation du mot de passe : *</label>
                    <input type="password" onkeyup="validerMdp()" name="mdpconfirm" id="mdpconfirm" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom : *</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="John" required
                           value="<?php if(!empty($_GET['prenom'])) { echo htmlspecialchars($_GET['prenom']); } ?>"/>
                </div>
                <div class="form-group">
                    <label for="nom">Nom : *</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Smith" required
                           value="<?php if(!empty($_GET['nom'])) { echo htmlspecialchars($_GET['nom']); } ?>"/>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="0123456789"
                           value="<?php if(!empty($_GET['tel'])) { echo htmlspecialchars($_GET['tel']); } ?>"/>
                </div>
                <div class="form-group">
                    <label for="web">Site web :</label>
                    <input type="url" name="web" id="web" class="form-control" placeholder="www.something.com"
                           value="<?php if(!empty($_GET['website'])) { echo htmlspecialchars($_GET['website']); } ?>"/>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 32px">
                <label for="sexe">Sexe :</label>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="sexe" id="H" value="H" checked>
                        Homme
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="sexe" id="F" value="F">
                        Femme
                    </label>
                </div>
                <div class="form-group" style="margin-top: 16px">
                    <label for="datenaissance">Date de naissance : *</label>
                    <input type="date" name="datenaissance" id="datenaissance" class="form-control" required onchange="calculAge()"
                           value="<?php if(!empty($_GET['anniv'])) { echo htmlspecialchars($_GET['anniv']); } ?>"/>
                </div>
                <div class="form-group">
                    <label for="age">Age :</label>
                    <input type="number" name="age" id="age" class="form-control" disabled/>
                </div>
                <div class="form-group">
                    <label for="ville">Ville :</label>
                    <input type="text" name="ville" id="ville" class="form-control" placeholder="Paris"
                           value="<?php if(!empty($_GET['ville'])) { echo htmlspecialchars($_GET['ville']); } ?>"/>
                </div>
                <div class="form-group">
                    <label for="taille">Taille : <span id="afficheTaille">1</span> m</label>
                    <input type="range" name="taille" id="taille" min="0" max="2.5" value="1" step="0.01" oninput="document.getElementById('afficheTaille').textContent=value"
                           value="<?php if(!empty($_GET['taille'])) { echo htmlspecialchars($_GET['taille']); } ?>"/>
                </div>
                <div class="form-group" style="margin-top: 28px">
                    <label for="couleur">Couleur préférée :</label>
                    <input type="color" name="couleur" id="couleur" class="form-control"
                           value="<?php if(!empty($_GET['couleur'])) { echo htmlspecialchars($_GET['couleur']); } ?>"/>
                </div>
                <div class="form-group" style="margin-top: 20px">
                    <label for="profilepicfile">Photo de profil:</label>
                    <div>
                        <div>
                            <input type="hidden" name="profilepic" id="profilepic"/>
                            <canvas id="preview" width="96" height="96" style="border: solid"></canvas>
                        </div>
                        <div style="float: left">
                            <input type="file" id="profilepicfile" onchange="chargerPhotoProfil()"/>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 28px">
                    <input class="btn btn-primary" type="submit" value="S'inscrire >>">
                </div>
            </div>
            </div>

        </div>
    </form>
    </div>
</div>
</body>
</html>