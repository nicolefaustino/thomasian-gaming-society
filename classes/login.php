<?php 

class Login extends DbHandler{

    protected function checkUser($user, $password) {
        $stmt = $this->connect()->prepare("SELECT user_username FROM user_table WHERE user_username = :user AND user_password = :pass ;");
        $arr = [
            ':user' => $user, 
            ':pass' => $password
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

    protected function findUser($user, $password){
        $stmt = $this->connect()->prepare("SELECT user_id FROM user_table WHERE user_username = :user AND user_password = :pass ;");
        $arr = [
            ':user' => $user, 
            ':pass' => $password
        ];

        // Execute the statement and check for errors
        if (!$stmt->execute($arr)) {
            // Redirect if execution fails
            header("location: ../login_page.php?error=failedSQLSELECT");
            exit();
        }

        // Fetch data after successful execution
        $loginData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$loginData){
            header("location: ../login_page.php?error=userCannotbeFound");
            exit();
        }

        $stmt = null; // Close the statement

        // Determine if user exists
        return $loginData['user_id'];

    }

}