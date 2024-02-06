<?php
$title = "Message";
include("partials/_header.php");
?>
<div id="main_content" class="row">
    <div class="col-md-4 col-lg-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">Contact  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
            <div class="panel-body">          
                <table class="table table-bordered">
                    <?php 
                    foreach ($data as $contenue):?>
                    <tr>
                        <td><a href="#"><?=$contenue['pseudo']?></a></td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
         <?php require('partials/_errors.php'); ?>
        <div class="panel panel-default panel-info">
            <div class="panel-heading">Ecrire une message  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <select class="form-control" name="contact">
                            <option></option>
                            <?php foreach ($data as $contenue): ?>
                            <option value="<?=$contenue['id'];?>"><?=$contenue['pseudo'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                   
                    <div class="form-group">
                        <label for="bio">Message</label>
                        <textarea cols="30" rows="5" class="form-control" name="contenue"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="envoyer"/>
                </form>
            </div>
        </div>
        
        <?php 
        foreach ($data1 as $contenue): ?>
        <?php 
        $etiquete;
        $couleur;
        if($_SESSION['user_id']==$contenue['id1']){            
            $etiquete ="Message Envoyer à ".get_user_by_id($contenue['id2'],'name')." le ".$contenue['date'];
            $couleur = "panel panel-info";
        }
        if($_SESSION['user_id']==$contenue['id2']){            
            $etiquete ="Message De ".get_user_by_id($contenue['id1'],'name')." le ".$contenue['date'];
            $couleur = "panel panel-success";
        }
         ?>
        <div class="form-group">
            <div class="<?= $couleur ?>">
                <div class="panel-heading"><?= $etiquete;?></div>
                <div class="panel-body">
                  <?= $contenue['contenue'];?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
</div>
<?php
include("partials/_footer.php");
?>