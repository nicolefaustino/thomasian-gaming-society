<?php

class LoginController extends Login {
    private $user;
    private $pass;

    public function __construct($user, $pass){
        $this->user=$user;
        $this->pass=$pass;
    }

    public function loginUser(){
    
        if($this->checkCredentials()==false) {
            header("location: ../login_page.php?error=incorrectCredentials");
            exit();
        }
        return $this->findUser($this->user, $this->pass);
    }

    private function checkCredentials(){
        return $this->checkUser($this->user, $this->pass);
    }
}