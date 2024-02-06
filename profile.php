<?php
session_start();
include('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");
require('includes/constants.php');

if(!empty($_GET['id'])){
    //Recuperer les information l'utilisateur dans bdd
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        redirect('index.php');
    }
}else{
    /*if($_SESSION['user_id'] != $_GET['id']){
        
        
    }else{
        
    }*/
    redirect('profile.php?id='.get_session('user_id'));
}

require("views/profile.view.php");