<?php

class DbHandler{
    protected function connect(){
        try {
            $dbUser="root";
            $dbPass="";
            $dbh= new PDO('mysql:host=localhost;dbname=tgs_database', $dbUser, $dbPass);
            return $dbh;
        } catch (PDOException $e) {
            print $e->getMessage();
            die();
        }
    }
}