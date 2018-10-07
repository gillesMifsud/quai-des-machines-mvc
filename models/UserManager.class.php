<?php

class UserManager {
    
    private $_db;
    
    public function __construct($db) {
        $this->setDb($db);
    }
    
    public function setDb($db) { $this->_db = $db; }
    
    public function checkUser($username, $password) {

        $user = $this->_db->query("SELECT * FROM users
                                     WHERE USERNAME = '$username'
                                     AND PASSWORD = '$password' ",PDO::FETCH_OBJ);
        $data = $user->fetch();
        return $data;
    }   
}

?>