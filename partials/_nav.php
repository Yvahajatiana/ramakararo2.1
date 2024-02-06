<nav class="navbar navbar-inverse " role="navigation">
    <div class="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php echo WEBSITE_NAME ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
            <?php if(!isset($_SESSION['user_id'])):?>
            <ul class="nav navbar-nav">
                <li class="<?= set_active('index') ?>"><a href="index.php">Accueil</a></li>
                <li class="<?= set_active('login') ?>"><a href="login.php">Connexion</a></li>
                <li class="<?= set_active('register') ?>"><a href="register.php">Inscription</a></li>
            </ul>
            <?php else:?>
            <ul class="nav navbar-nav">
                <li class="<?= set_active('index') ?>"><a href="index.php">Accueil</a></li>
                <li class="<?= set_active('login') ?>"><a href="logout.php">Deconnexion</a></li>
                <li class="<?= set_active('register') ?>"><a href="profile.php">Profil</a></li>
            </ul>
            <?php endif; ?>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<?php if(isset($_SESSION['user_id']) && $title != "Accueil"):?>
<nav class="margebas">
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group " role="group">
            <a class="btn btn-default" href="statut.php">Fil d'actualité  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></a>
        </div>
        <div class="btn-group" role="group" >
          <a class="btn btn-default" href="message.php">Messages <span class="glyphicon glyphicon-envelope" aria-hidden="true"></a>
        </div>
        <div class="btn-group" role="group">
          <a  class="btn btn-default" href="">Evénements <span class="glyphicon glyphicon-calendar" aria-hidden="true"></a>
        </div>
        <div class="btn-group" role="group">
          <a class="btn btn-default" href="">Emplois <span class="glyphicon glyphicon-book" aria-hidden="true"></a>
        </div>
     </div>
</nav>
<?php endif; ?>