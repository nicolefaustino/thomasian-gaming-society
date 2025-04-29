<?php
    include "../classes/dbh.php";
    include "../classes/admin_controls.php";

    if(empty(trim($_POST['title'])) || empty(trim($_POST['genre'])) || empty(trim($_POST['desc'])) || empty(trim($_POST['link']))){
            header("location: ../admin_panel.php?status=InvalidInformation");
            exit();
    }

    $handler = new adminHandler();

    if($handler->checkGame($_POST['title'])){
        header("Location: http://localhost/finals_appdev/admin_panel.php?status=gameExists");
        exit();
    }

    $handler->insertGame($_POST['title'],$_POST['genre'],$_POST['desc'],$_POST['link']);

    header("Location: http://localhost/finals_appdev/admin_panel.php?status=success");
?>