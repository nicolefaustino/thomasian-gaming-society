<?php
    include "../classes/dbh.php";
    include "../classes/admin_controls.php";

    if(empty(trim($_POST['gameToEdit'])) || empty(trim($_POST['title2'])) || empty(trim($_POST['genre2'])) || empty(trim($_POST['desc2'])) || empty(trim($_POST['link2']))){
            header("location: ../admin_panel.php?status=InvalidInformation");
            exit();
    }

    $handler = new adminHandler();

    $handler->updateGame($_POST['gameToEdit'],$_POST['title2'],$_POST['genre2'],$_POST['desc2'],$_POST['link2']);

    header("Location: http://localhost/finals_appdev/admin_panel.php?status=successUpdate");
?>