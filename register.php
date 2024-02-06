<?php
session_start();
include('filters/guest_filter.php');
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');
    if(isset($_POST['register'])){
        // si tous les champs ont été remplir
        if(not_empty(['name','pseudo','email','password','password_confirm'])){

            $errors = array();
            extract($_POST);

            if(mb_strlen($pseudo)<3){
                $errors[] = "Pseudo fohika loatra (minimuim 3 caractere)";
            }
            if(! filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors[] = "E-mail invalide";
            }
            if(mb_strlen($password)<6){
                $errors[] = "Mot de passe fohika loatra (minimuim 6 caractere)";
            }else{
                if($password != $password_confirm){
                    $errors[] = "Tsy mitovy mot de passe 2 napidirinao";
                }
            }
            if(is_already_in_use('pseudo',$pseudo,'users')){
                $errors[] = "Pseudo efa misy tompony";
            }
            if(is_already_in_use('email',$email,'users')){
                $errors[] = "Adresse e-mail efa nampiasaina";
            }
            if(count($errors)==0){
                // Envoie e-mail d'activation
                $to = $email;
                $subject = WEBSITE_NAME." - ACTIVATION DE COMPTE";
                $password = sha1($password);
                $token = sha1($pseudo.$email.$password);

                ob_start();
                require('templates/emails/activation.tmpl.php');
                $content = ob_get_clean();

                $headers = "MINE-Version: 1.0". "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

                mail($to,$subject,$content,$headers);

                // Message de voir e-mail d'activation

                $lien = WEBSITE_URL.'/activation.php?p='.$pseudo.'&amp;token='.$token;
                //Zone a remplacéé
                set_flash("Efa nalefa ".$lien,'success');
                // zone fin

                $q = $db->prepare('INSERT INTO users(name,pseudo,email,password)
                                    VALUES(:name, :pseudo, :email, :password)');
                $q->execute([
                    'name' => $name,
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => $password
                ]);

                redirect('index.php');
            }else{
                save_input_data();
            }
        }else{
            $errors[] = "Mba fenoy tsara rô gny Formulaire";
            save_input_data();
        }
    }else{
        clear_input_data();
    }
?>
<?php
require("views/register.view.php");