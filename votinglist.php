<?php
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="votinglist.css">
        <title>Games Directory</title>
    </head>
    <body>
    <header class="navbar">
        <div class="navbar-logo">
            <img src="TGS.png" alt="Logo">
            <a href="pageone.html">THOMASIAN GAMING SOCIETY</a>
        </div>
        <nav class="navbar-links">
            <a href="login_page.php">LOGIN</a>
            <a href="discover.php">GAMES</a>
            <a href="votinglist.php">RATINGS</a>
            <a href="teams.php">TEAM</a>
            <a href="faqs.html">FAQ</a>
        </nav>
    </header>
    
    <h1 style="margin-bottom:0;margin-left:2.5%;">Games Directory</h1>
        <!-- <div class='taskbar'>
            <a href ='pageone.html' class='taskbar'>homepage</a>
            <a href ='/finals_appdev/homepage.php' class='taskbar'>other page...</a> 
            <a href ='/finals_appdev/login_page.php' class='taskbar'>change user...</a> 
        </div> -->


        <?php
    include 'classes\dbh.php';
    include 'classes\game_get.php';
    $fetchGames= new gameHandler();
    $result=$fetchGames->getData();
    echo "<div class=\"gamelist\">";

    foreach($result as $game){
        echo "<div class=\"gamelistfrag\">";
        echo "<form action='votepage.php' method='POST'>";
        // echo $game['game_id'] . '<br>';
        echo "<h2>". $game['game_name'] . "</h2><br>". '<h4>';
        echo $game['game_genre'] . '</h4><br>';
        echo '<p>'.$game['game_desc'] . '</p><br>';
        echo "<img src= ".$game['game_imagelink']."><br>";
        echo "<button type='submit' name='selected'value =". $game['game_id'] . ">Vote Here!</button><br>";
        echo "</form>";
        echo "</div>";
    }

    echo "</div>";
?>
    <footer>
        <p><a href="devteam.html">CICS SY 2024-2025 | ICS2609 FINALS | MADE BY: GROUP 8</a></p>        
    </footer>
    </body>
</html>

