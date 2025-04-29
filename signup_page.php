<html>
<head>
        <link rel="stylesheet" href="signupstyles.css">
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
  
        <div class="signup">
            <h3>SIGNUP</h3>
            <form action="/finals_appdev/includes/signup_handler.php" method="POST">
            <label for="fname">Username: </label>
            <input type="text" id="user" name="user">
            <label for="fname">Email: </label>
            <input type="text" id="email" name="email">
            <label for="fname">Password: </label>
            <input type="password" id="pass" name="pass">
            <button type="submit" name="submit">SIGNUP</button>
            </form>
        </div>
        
    </body>
</html>

<?php
?>