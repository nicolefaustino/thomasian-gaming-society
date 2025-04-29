<html>
<head>
        <link rel="stylesheet" href="loginstyles.css">
        <title>Login Page</title>
    </head>
    <body>

    <div class="header">
    <!-- Logo and Text -->
    <div class="logo-container">
        <img src="TGS.png" alt="Thomasian Gaming Society Logo" class="logo">
        <h1>THOMASIAN GAMING SOCIETY</h1>
    </div>  
</div>
  
        <div class="login">
            <h3>LOGIN</h3>
            <form action="/finals_appdev/includes/login_handler.php" method="POST">
            <label for="fname">Username:</label>
            <input type="text" id="user" name="user">
            <label for="fname">Password:</label>
            <input type="password" id="pass" name="pass">
            <button type="submit" name="submit">LOGIN</button>
            </form>
            <p><a href="signup_page.php">Sign Up</a></p>
        </div>
        
    </body>
</html>

<?php
?>