
<?php
    class adminHandler extends DbHandler {
        function getAdminList(){
            $stmt=$this->connect()->prepare("
            SELECT user_table.user_id, admin_firstname, admin_lastname, admin_pfp, user_email FROM admin_table 
            LEFT JOIN user_table ON admin_table.user_id = user_table.user_id
;");

            if (!$stmt->execute()) {
                // Redirect if execution fails
                header("admin_panel.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;
            return $result;

        }

        function insertGame($name, $genre, $desc, $link){
            $stmt=$this->connect()->prepare("
            INSERT INTO game_table (game_name, game_genre, game_desc, game_imagelink) VALUES ( :name , :genre , :desc, :link)
            ;");

            if (!$stmt->execute(
                [':name' => $name,
                ':genre' => $genre,
                ':desc' => $desc,
                ':link' => $link,
                ]
            )) {
                // Redirect if execution fails
                header("admin_panel.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;
            return $result;

        }

        function updateGame($id, $name, $genre, $desc, $link){
            $stmt=$this->connect()->prepare("
            UPDATE game_table 
            SET game_name = :name , game_genre = :genre , game_desc = :desc , game_imagelink = :link 
            WHERE game_id = :id
            ;");

            if (!$stmt->execute(
                [ ':id' => $id,
                ':name' => $name,
                ':genre' => $genre,
                ':desc' => $desc,
                ':link' => $link,
                ]
            )) {
                // Redirect if execution fails
                header("admin_panel.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;
            return $result;

        }

        function deleteGame($id){
            $stmt=$this->connect()->prepare("
            DELETE FROM game_table WHERE game_id = :id
            ;");

            if (!$stmt->execute(
                [ ':id' => $id ]
            )) {
                // Redirect if execution fails
                header("admin_panel.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;
            return $result;

        }

        function getReport(){
            $stmt=$this->connect()->prepare("
                SELECT main.game_id, 
                game_name, 
                game_genre, 
                game_desc, 
                COALESCE(total_ratings, 0) AS total_ratings, 
                COALESCE(avg_ratings, 0) AS avg_ratings,
                COALESCE(total_comment, 0) AS total_comments
                FROM game_table main
                LEFT JOIN (SELECT game_id, COUNT(*) total_ratings FROM rating_table GROUP BY game_id) total_rating_count 
                ON main.game_id=total_rating_count.game_id
                LEFT JOIN (SELECT game_id, AVG(rating) avg_ratings FROM rating_table GROUP BY game_id) total_rating_avg
                ON main.game_id=total_rating_avg.game_id
                LEFT JOIN (SELECT game_id, COUNT(*) total_comment FROM comment_table GROUP BY game_id) total_comments
                ON main.game_id=total_comments.game_id ;
            ;");

            if (!$stmt->execute()) {
                // Redirect if execution fails
                header("admin_panel.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;
            return $result;

        }

        function searchAdmin($id){
            $stmt=$this->connect()->prepare("
            SELECT * FROM admin_table WHERE user_id = :user
;");

            if (!$stmt->execute(
                [':user' => $id,
                ]
            ))
                
                
                {
                // Redirect if execution fails
                header("admin_panel.php?error=failedSelect");
                exit();
            }

            $result=$stmt->fetchAll();
            $stmt=null;

            if(count($result)==0){
                return false;
            } else {
                return true;
            }

        }

        function checkGame($name) {
            $stmt = $this->connect()->prepare("SELECT game_name FROM game_table WHERE game_name = :user ;");
            $arr = [
                ':user' => $name
            ];
    
            // Execute the statement and check for errors
            if (!$stmt->execute($arr)) {
                // Redirect if execution fails
                header("location: ../login_page.php?error=failedSQLSELECT");
                exit();
            }
    
            // Fetch data after successful execution
            $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null; // Close the statement
    
            // Determine if user exists
            return count($loginData) > 0;
    
        }

    }
?>