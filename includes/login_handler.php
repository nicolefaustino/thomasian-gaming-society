<?php
session_start();

echo $_POST["user"];
if(isset($_POST["submit"])) {  
    //Yoinking da data teehee
    $user=$_POST["user"];
    $pass=$_POST["pass"];

    include "../classes/dbh.php";
    include "../classes/login.php";
    include "../classes/login_controller.php";
    $signup= new loginController($user, $pass);

    $_SESSION['current_user']=$signup->loginUser();
    echo $_SESSION['current_user'];

    header("Location: http://localhost/finals_appdev/pageone.html");
}
?> 