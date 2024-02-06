<?php
session_start();
include('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");
require('includes/constants.php');
$data = get_friends();
$data1 = red_msg();

if(isset($_POST['envoyer'])){
    if(not_empty(['contact','contenue'])){      
        extract($_POST);
        $q = $db->prepare('INSERT INTO msg(id1,id2,contenue)
                             VALUES(:id1, :id2, :contenue)');
        $q->execute([
                    'id1' => $_SESSION['user_id'],
                    'id2' => $contact,
                    'contenue' => $contenue
                    ]);
        set_flash("Message Envoyer",'success');
        redirect('#');
    }else{
        $errors[] = "Fenoy tsara ny champ rehetra";
        //save_input_data();
    }
}
require("views/message.view.php");
