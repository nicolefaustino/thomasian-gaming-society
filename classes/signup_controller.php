<?php

class SignupController extends Signup {
    private $user;
    private $email;
    private $pass;

    public function __construct($user, $email, $pass){
        $this->user=$user;
        $this->email=$email;
        $this->pass=$pass;
    }

    public function signupUser(){
        if($this->emptyInput()==false) {
            header("location: ../login_page.php?error=emptyInput");
            exit();
        }

        /*
        if($this->invalidUsername()==false) {
            header("location: ../login_page.php?error=invalidUsername");
            exit();
        } */

        if($this->invalidEmail()==false) {
            header("location: ../login_page.php?error=invalidEmail");
            exit();
        }

        if($this->userTaken()==false) {
            header("location: ../login_page.php?error=userTaken");
            exit();
        }

        $this->setUser($this->user, $this->email, $this->pass);
    }

    private function emptyInput(){
        $result=true;
        if(empty($this->user) || empty($this->email) || empty($this->pass)){
            $result=false;
        } 
        return $result;
    }

    /*
    private function invalidUsername(){
        $result=false;
        if(!preg_match("/^[a-zA-Z0-9]*^$/", $this->user)){
            $result=false;
        } else {
            $result=true;
        }
        return $result;
    } */

    private function invalidEmail(){
        $result=true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result=false;
        } 
        return $result;
    }

    private function userTaken(){
        $result=false;
        if(!$this->checkUser($this->user, $this->email)){
            $result = true;
        } else {
            $result=false;
        }
        return $result;
    }
}