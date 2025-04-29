<?php
    session_start();
?>

<html>
<link rel="stylesheet" type="text/css" href="teamstyles.css">
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

    <div class="admin-list">
    <h2>MEET THE TGS TEAM!</h2>
        <?php
        include "classes\dbh.php";
        include "classes\admin_controls.php";

        $fetchGames = new adminHandler();
        $result = $fetchGames->getAdminList();
        foreach ($result as $admin) {
            echo '<div class="admin-item">';
            echo '<div class="admin-pfp">';
            echo '<img src="' . $admin['admin_pfp'] . '" alt="Profile Picture">';
            echo '</div>';
            echo '<div class="admin-name">';
            echo '<strong>' . $admin['admin_firstname'] . ' ' . $admin['admin_lastname'] . '</strong>';
            echo '<br>';
            echo $admin['user_email'];            
            echo '</div>';
            echo '</div>';
        }
            if($fetchGames->searchAdmin($_SESSION['current_user'])){
                echo "<a href='admin_panel.php'>TO ADMIN PANEL</a>";
            }
        ?>
    </div>
    <footer>
        <p><a href="devteam.html">CICS SY 2024-2025 | ICS2609 FINALS | MADE BY: GROUP 8</a></p>        
    </footer>
    </body>
</html>
