<?php

class Signup extends DbHandler{

    protected function checkUser($user, $email) {
        $stmt = $this->connect()->prepare("SELECT user_username FROM user_table WHERE user_username = :user OR user_email = :email;");
        $arr = [
            ':user' => $user, 
            ':email' => $email
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

    protected function setUser($user, $email, $pass) {
        $stmt = $this->connect()->prepare('INSERT INTO user_table (user_username, user_email, user_password) VALUES (?, ?, ?)');
    
        // Execute the statement and check for errors
        if (!$stmt->execute([$user, $email, $pass])) {
            // Redirect if execution fails
            $stmt = null; // Close the statement
            header("location: ../login_page.php?error=failedSQLINSERT");
            exit();
        }
    
        $stmt = null; // Close the statement after successful execution
    }
}