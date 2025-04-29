<?php
if(isset($_POST["submit"])) {  

    //Yoinking da data teehee
    $user=$_POST["user"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];

    include "../classes/dbh.php";
    include "../classes/signup.php";
    include "../classes/signup_controller.php";
    $signup= new SignupController($user, $email, $pass);

    $signup->signupUser();
    header("Location: http://localhost/finals_appdev/login_page.php");
}
?> 