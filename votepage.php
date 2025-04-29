<?php
session_start();
?>

<html>
<link rel="stylesheet" type="text/css" href="votepage.css">
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
    
        <?php

        if(isset($_POST['selected'])){
        $_SESSION['current_game']=$_POST['selected'];
        }

        include 'classes\dbh.php';
        include 'classes\game_get.php';
        $fetchGames = new gameHandler();
        $result = $fetchGames->getGame($_SESSION['current_game']);
        $rating = $fetchGames->getRating($_SESSION['current_game']);
        $totalRates = $fetchGames->getTotalRates($_SESSION['current_game']);

        // Array of game info
        echo '<div class="content-container">';

        // Game Info Section
        echo '<div class="game-info">';
        echo '<h2><strong></strong> ' . $result['0']['game_name'] . '</h2>';
        echo '<p><strong></strong> ' . $result['0']['game_desc'] . '</p>';
        echo '<p><strong></strong> <img src="' . $result['0']['game_imagelink'] . '" alt="Game Image" class="game-image"></p>';
        echo '<p><strong>Rating:</strong> ' . $rating . '</p>';
        echo '<p><strong>Votes:</strong> ' . $totalRates . '</p>';
        echo '</div>';

        // Rating Form Section
        echo '<div class="rating-form">';
        echo '<h2>RATE THIS GAME</h2>';
        echo "
        <form action='votepage.php' method='POST'>
            <input type='radio' id='rate1' name='rate' value=1>
            <label for='rate1'>1</label><br>
            <input type='radio' id='rate2' name='rate' value=2>
            <label for='rate2'>2</label><br>  
            <input type='radio' id='rate3' name='rate' value=3>
            <label for='rate3'>3</label><br>
            <input type='radio' id='rate4' name='rate' value=4>
            <label for='rate4'>4</label><br>
            <input type='radio' id='rate5' name='rate' value=5>
            <label for='rate5'>5</label><br>
            <label for='comm'>COMMENT</label>
            <textarea id='comm' name='comm' maxlength=500></textarea><br><br>
            <button type='submit' value='set' name=rated>Submit</button>
        </form>
        ";
        echo '</div>';
        echo '</div>';

        $comms = $fetchGames->getComment($_SESSION['current_game']);

        // Display Comments
        echo '<div class="comments">';
        foreach($comms as $singlecomm) {
            echo '<div class="commentsfrag">';
            echo '<p>' . $singlecomm['user_username'] . ' says...</p>';
            echo '<p>' . $singlecomm['comment_content'] . '</p>';
            echo '<p>' . $singlecomm['date_added'] . '</p>';
            echo '</div>';
        }
        echo '</div>';

        // Handle rating submission
        if (isset($_POST['rated']) && isset($_POST['rate']) && !isset($_COOKIE[$_SESSION['current_user']])) {
            $fetchGames->addRating($_SESSION['current_user'], $_SESSION['current_game'], $_POST['rate']);
            echo 'Game rated successfully';
            setcookie($_SESSION['current_user'], 'voted', time() + (86400), "/");

            header("Location: http://localhost/finals_appdev/votepage.php");

            if (!empty(trim($_POST['comm']))) {
                $fetchGames->addComment($_SESSION['current_user'], $_SESSION['current_game'], $_POST['comm']);
            }
        } elseif (isset($_COOKIE[$_SESSION['current_user']])) {
        }
        ?>

    <footer>
        <p><a href="devteam.html">CICS SY 2024-2025 | ICS2609 FINALS | MADE BY: GROUP 8</a></p>        
    </footer>
    </body>
</html>