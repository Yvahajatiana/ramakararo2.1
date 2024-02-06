<?php
$title = "Connexion";
include("partials/_header.php");
?>
    <div id="main_content">
        <div class="container col-md-6 col-md-offset-3">
            <h2 class="lead">Connexion:</h2>
            <?php require('partials/_errors.php'); ?>
            <form method="post" class="well">
                <div class="form-group">
                    <!-- nom -->
                    <label class="control-label" for="identifiant">Pseudo ou E-mail:</label>
                    <input class="form-control" type="text" required="required" id="name" name="identifiant" value="<?= get_input('identifiant'); ?>"/>
                </div>
                <!-- password -->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe:</label>
                    <input class="form-control" type="password" required="required" id="password" name="password"/>
                </div>
                <button type="submit" class="btn btn-primary" value="inscription" name="login">Connexion</button>

            </form>
        </div><!-- /.container -->
    </div>
<?php
include("partials/_footer.php");
?>