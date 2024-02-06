<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="yva hajatiana" content="">

    <title>
        <?php
            if(isset($title)){
                echo $title.WEBSITE_NAME;
            }else{
                echo WEBSITE_NAME;
            }
        ?>
    </title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/main.css" rel="stylesheet">

</head>

<body>
<?php
include("partials/_nav.php");
include("partials/_flash.php");
?>