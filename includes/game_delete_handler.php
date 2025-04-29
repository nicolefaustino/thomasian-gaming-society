<?php
    include "../classes/dbh.php";
    include "../classes/admin_controls.php";

    if(empty(trim($_POST['gameDelete'])) || empty(trim($_POST['validation'])) ){
            header("location: ../admin_panel.php?status=CannotProceed");
            exit();
    }

    $handler = new adminHandler();

    $handler->deleteGame($_POST['gameDelete']);

    header("Location: http://localhost/finals_appdev/admin_panel.php?status=success");
?>