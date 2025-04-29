<html>
<link rel="stylesheet" href="admin_panel.css">
    <body>

    <header class="navbar">
        <div class="navbar-logo">
            <img src="tgs-logo.jpg" alt="Logo">
            <a href="pageone.html">THOMASIAN GAMING SOCIETY</a>
        </div>
        <nav class="navbar-links">
            <a href="login_page.php">LOGIN</a>
            <a href="#">GAMES</a>
            <a href="teams.html">TEAM</a>
            <a href="faqs.html">FAQ</a>
        </nav>
    </header><br><br>

    <div class="form-container">
    <form action="includes/game_insert_handler.php" method="POST">
        <label for="fname">Game Title:</label>
        <input type="text" id="title" name="title"> 
        <br>
        <label for="genre">Genre:</label>
        <select name="genre" id="genre">
        <option value="">Select a Genre</option>
        <option value="Horror">Horror</option>
        <option value="FPS">FPS</option>
        <option value="Cozy">Cozy</option>
        </select>
        <label for='desc'>Description:</label>
        <textarea id='desc' name='desc' maxlength=100></textarea><br>
        <label for="link">Image Link:</label> 
        <input type="text" id="link" name="link"> 
        <button type="submit" name="submit" value="newGame">NEW GAME</button>
        </form> <br>

        <form action="includes/game_update_handler.php" method="POST">
        <label for="gameEdit">Select Game to Edit:</label>
            <select name="gameToEdit" id="gameToEdit">
            <option value="">Select a Game:</option>
                <?php
                    include "classes\dbh.php";
                    include "classes\game_get.php";

                    $fetchGames= new gameHandler();
                    $result=$fetchGames->getData();
                    foreach($result as $game){
                        echo "<option value=".$game['game_id'].">". $game['game_name'] ."</option>";
                    }
                ?>
            </select> <br>
            <label for="title2">New Title:</label>
            <input type="text" name="title2" id="title2"> <br>
            <label for="genre2">Genre:</label>
            <select name="genre2" id="genre2">
            <option value="">Select a Genre</option>
            <option value="Horror">Horror</option>
            <option value="FPS">FPS</option>
            <option value="Cozy">Cozy</option>
            </select> <br>
            <label for='desc2'>Description:</label>
            <textarea id='desc2' name='desc2' maxlength=100></textarea><br>
            <label for="link2">Image Link:</label>
            <input type="text" id="link2" name="link2"> 
            <br>
            <button type="submit" name="submit" value="updateGame">UPDATE GAME</button>
        </form> 

        <form action="includes/game_delete_handler.php" method="POST">
            <label for="gameDelete">Select Game to Delete:</label>
            <select name="gameDelete" id="gameDelete">
            <option value="">Select a Game</option>
                <?php
                    $fetchGames2 = new gameHandler();
                    $result2=$fetchGames2->getData();
                    foreach($result2 as $game2){
                        echo "<option value=".$game2['game_id'].">". $game2['game_name'] ."</option>";
                    }
                ?>
            </select> <br>
                <label for="validation">I am sure this game must be deleted:</label>
                <input type="checkbox" id="validation" name="validation" value="validated"> <br><br>
            <button type="submit" name="submit" value="newGame">DELETE GAME</button>
        </form>

        <form action="includes/generate_report_handler.php" method="POST">
            <button type="submit" name="submit" value="generateReport">GENERATE REPORT</button>
        </form>
            </div>
    </body>
