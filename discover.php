<?php
include 'classes/dbh.php';
include 'classes/game_get.php';

$fetchGames = new gameHandler();
$horrorGames = $fetchGames->getGamesForGenre('Horror');
$FPSGames = $fetchGames->getGamesForGenre("FPS");
$cozyGames = $fetchGames->getGamesForGenre("Cozy");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Games</title>
    <link rel="stylesheet" href="discover.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-logo">
            <img src="tgs-logo.jpg" alt="Logo">
            <a href="pageone.html">THOMASIAN GAMING SOCIETY</a>
        </div>
        <nav class="navbar-links">
            <a href="login_page.php">LOGIN</a>
            <a href="discover.php">GAMES</a>
            <a href="teams.php">TEAM</a>
            <a href="faqs.php">FAQ</a>
        </nav>
    </header>

    <h1 class="discover-title">DISCOVER GAMES</h1>

    <div class="categories-container">
        <!-- Horror Games -->
        <div class="category">
            <h2>Horror Games</h2>
            <div class="games">
                <?php foreach ($horrorGames as $game): ?>
                    <div class="game-card">
                        <form action="votepage.php" method="POST">
                            <a href="votepage.php"><?= $game['game_name'] ?></a>
                            <p><?= $game['game_genre'] ?></p>
                            <p><?= $game['game_desc'] ?></p>
                            <img src="<?= $game['game_imagelink'] ?>" alt="<?= $game['game_name'] ?>">
                            <p>Rating: <?= $game['rating'] ?></p>
                            <button type="submit" name="selected" value="<?= $game['game_id'] ?>">Vote Here!</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- FPS Games -->
        <div class="category">
            <h2>FPS Games</h2>
            <div class="games">
                <?php foreach ($FPSGames as $game): ?>
                    <div class="game-card">
                        <form action="votepage.php" method="POST">
                            <a href="votepage.php"><?= $game['game_name'] ?></a>
                            <p><?= $game['game_genre'] ?></p>
                            <p><?= $game['game_desc'] ?></p>
                            <img src="<?= $game['game_imagelink'] ?>" alt="<?= $game['game_name'] ?>">
                            <p>Rating: <?= $game['rating'] ?></p>
                            <button type="submit" name="selected" value="<?= $game['game_id'] ?>">Vote Here!</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Cozy Games -->
        <div class="category">
            <h2>Cozy Games</h2>
            <div class="games">
                <?php foreach ($cozyGames as $game): ?>
                    <div class="game-card">
                        <form action="votepage.php" method="POST">
                            <a href="votepage.php"><?= $game['game_name'] ?></a>
                            <p><?= $game['game_genre'] ?></p>
                            <p><?= $game['game_desc'] ?></p>
                            <img src="<?= $game['game_imagelink'] ?>" alt="<?= $game['game_name'] ?>">
                            <p>Rating: <?= $game['rating'] ?></p>
                            <button type="submit" name="selected" value="<?= $game['game_id'] ?>">Vote Here!</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <footer>
        <p><a href="devteam.html">CICS SY 2024-2025 | ICS2609 FINALS | MADE BY: GROUP 8</a></p>        
    </footer>
</body>
</html>