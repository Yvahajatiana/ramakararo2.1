<?php
$title = "register";
include("partials/_header.php");
?>
    <div id="main_content">
        <div class="container col-md-6 col-md-offset-3">
            <h2 class="lead">Inscription:</h2>
            <?php require('partials/_errors.php'); ?>
            <form method="post" class="well">
                <div class="form-group">
                    <!-- nom -->
                    <label class="control-label" for="name">Nom:</label>
                    <input class="form-control" type="text" required="required" id="name" name="name" value="<?= get_input('name'); ?>"/>
                </div>
                <!-- prenom -->
                <div class="form-group">
                    <label class="control-label" for="pseudo">Pseudo:</label>
                    <input class="form-control" type="text" required="required" id="pseudo" name="pseudo" value="<?= get_input('pseudo'); ?>"/>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label class="control-label" for="email">E-mail:</label>
                    <input class="form-control" type="email" required="required" id="email" name="email" value="<?= get_input('email'); ?>"/>
                </div>
                <!-- email confirm -->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe:</label>
                    <input class="form-control" type="password" required="required" id="password" name="password"/>
                </div>
                <!-- email confirm -->
                <div class="form-group">
                    <label class="control-label" for="password_confirm">Confirmation Mot de passe:</label>
                    <input class="form-control" type="password" required="required" id="password_confirm" name="password_confirm"/>
                </div>
                <button type="submit" class="btn btn-primary" value="inscription" name="register">Inscription</button>

            </form>
        </div><!-- /.container -->
    </div>
<?php
include("partials/_footer.php");
?>