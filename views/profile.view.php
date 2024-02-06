<?php
$title = "Page de profil";
include("partials/_header.php");
?>
    <div id="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profil de <?= e($user->pseudo) ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= get_avatar_url($user->email)?>" alt="<?= e($user->pseudo)?>" class="img-circle"/>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <strong><?= e($user->pseudo) ?></strong></br>
                                   <a href="mailto:<?=e($user->email)?>"><?=e($user->email)?></a>
                               </div>
                           </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tableau de bord</h3>
                        </div>
                        <div class="panel-body">
                            <?php include "partials/_errors.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Completer le CV </h3>
                        </div>
                        <div class="panel-body">
                            <?php include "partials/_errors.php"; ?>
                            <form method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <!-- Nom -->
                                            <label for="name">Nom<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Boto" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <!-- Ville-->
                                            <label for="city">Prénom<span class="text-danger">*</span></label>
                                            <input type="text" name="city" id="city" class="form-control" placeholder="Vohipeno" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><!-- Pays-->
                                            <label for="country">Date de Naissance<span class="text-danger">*</span></label>
                                            <input type="text" name="country" id="country" class="form-control" placeholder="Madagascar" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6"><!-- sexe-->
                                        <div class="form-group">
                                            <label for="sexe">Sexe<span class="text-danger">*</span></label>
                                            <select name="sexe" id="sexe" class="form-control">
                                                <option value="H">
                                                    Homme
                                                </option>
                                                <option value="F">
                                                    Femme
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6"><!-- twitter-->
                                        <div class="form-group">
                                            <label for="twitter">CIN<span class="text-danger">*</span></label>
                                            <input type="text" name="twitter" id="twitter" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6"><!-- github-->
                                        <div class="form-group">
                                            <label for="github">Situation familiale<span class="text-danger">*</span></label>
                                            <input type="text" name="github" id="github" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6"><!-- twitter-->
                                        <div class="form-group">
                                            <label for="twitter">Adresse(Ville)<span class="text-danger">*</span></label>
                                            <input type="text" name="twitter" id="twitter" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6"><!-- github-->
                                        <div class="form-group">
                                            <label for="github">Téléphone<span class="text-danger">*</span></label>
                                            <input type="text" name="github" id="github" class="form-control" required="required">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6"><!-- case coché-->
                                        <div class="form-group">
                                            <label for="available_for_hire" >
                                                <input type="checkbox" name="available_for_hire">
                                                Disponible pour emploi
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-md-12"><!-- case coché-->
                                        <div class="form-group">
                                            <label for="bio">Formation, Curcus professionel ,Experience<span class="text-danger">*</span></label>
                                            <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </div>
<?php
include("partials/_footer.php");
?>