<?php
    class gameHandler extends DbHandler{ 

        public function getData() {
            $stmt=$this->connect()->prepare("SELECT * FROM game_table;");

            if (!$stmt->execute()) {
                // Redirect if execution fails
                header("homepage.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;
            return $result;

        }

        public function getGame($game) {
            $stmt=$this->connect()->prepare("SELECT * FROM game_table WHERE game_id= :game;");
            $arr=array(':game'=>$game);

            if (!$stmt->execute($arr)) {
                // Redirect if execution fails
                header("homepage.php?error=failedSelectGame");
                exit();
            }

            $result=$stmt->fetchAll();

            if(count($result)==0){
                header("homepage.php?error=gameNotFound");
                exit();
            }

            $stmt=null;
            return $result;

        }

        public function getRating($game) {
            $stmt=$this->connect()->prepare("SELECT COALESCE(AVG(rating),0) AS rating FROM rating_table WHERE game_id= :game;");
            $arr=array(':game'=>$game);

            if (!$stmt->execute($arr)) {
                // Redirect if execution fails
                header("homepage.php?error=failedSelectGame");
                exit();
            }

            $result=$stmt->fetchAll();

            $stmt=null;
            return $result[0]['rating'];

        }

        public function getTotalRates($game) {
            $stmt=$this->connect()->prepare("SELECT COUNT(*) AS rating FROM rating_table WHERE game_id= :game;");
            $arr=array(':game'=>$game);

            if (!$stmt->execute($arr)) {
                // Redirect if execution fails
                header("homepage.php?error=failedSelectGame");
                exit();
            }

            $result=$stmt->fetchAll();

            $stmt=null;
            return $result[0][0];

        }

        public function addRating($user, $game,  $rating){

            $stmt = $this->connect()->prepare('INSERT INTO rating_table (user_id, game_id, rating) VALUES (?, ?, ?)');
            // Execute the statement and check for errors
            if (!$stmt->execute([$user, $game, $rating])) {
                // Redirect if execution fails
                $stmt = null; // Close the statement
                header("location: ../login_page.php?error=failedSQLINSERT");
                exit();
            }
        
            $stmt = null; // Close the statement after successful execution

        }

        public function addComment($user, $email,  $comm){

            $stmt = $this->connect()->prepare('INSERT INTO comment_table (user_id, game_id, comment_content) VALUES (?, ?, ?)');
            // Execute the statement and check for errors
            if (!$stmt->execute([$user, $email, $comm])) {
                // Redirect if execution fails
                $stmt = null; // Close the statement
                header("location: ../login_page.php?error=failedSQLINSERT");
                exit();
            }
        
            $stmt = null; // Close the statement after successful execution

        }

        public function getComment($game){

            $stmt = $this->connect()->prepare("
            SELECT comment_id, date_added, user_table.user_username, comment_content
            FROM comment_table 
            JOIN user_table ON comment_table.user_id=user_table.user_id
            WHERE game_id = :game ORDER BY date_added DESC;  
            ");
            // Execute the statement and check for errors
            if (!$stmt->execute([':game'=>$game])) {
                // Redirect if execution fails
                $stmt = null; // Close the statement
                header("location: ../login_page.php?error=failedSQL find");
                exit();
            }

            $result=$stmt->fetchAll();
        
            $stmt = null; // Close the statement after successful execution

            return $result;

        }

        public function getGamesForGenre($genre){

            $stmt = $this->connect()->prepare("
            SELECT game_table.game_id, game_name, game_genre, game_desc, game_imagelink, COALESCE(rating,0) as rating
            FROM game_table 
            LEFT JOIN (SELECT game_id, AVG(rating) AS rating FROM rating_table GROUP BY game_id) AS avg_rating_tbl ON
            game_table.game_id = avg_rating_tbl.game_id
            WHERE game_genre = :genre ;  
            ");
            // Execute the statement and check for errors
            if (!$stmt->execute([':genre'=>$genre])) {
                // Redirect if execution fails
                $stmt = null; // Close the statement
                header("location: ../login_page.php?error=failedSQL find");
                exit();
            }

            $result=$stmt->fetchAll();
        
            $stmt = null; // Close the statement after successful execution

            return $result;
        }


    }
?>