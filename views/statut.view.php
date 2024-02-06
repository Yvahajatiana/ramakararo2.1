<?php
$title = "Message";
include("partials/_header.php");
?>
<div class="main-content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-info">
                <div class="panel-heading">Ecrire votre Publication  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                <div class="panel-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="bio">Statut</label>
                            <textarea cols="30" rows="5" class="form-control" name="contenue"></textarea>
                        </div>
                        <input type="submit" class="btn btn-info" name="publier" value="Publier"/>
                        <input type="file" class="" name="publier" value="Publier"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("partials/_footer.php");
?>