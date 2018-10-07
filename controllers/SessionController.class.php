<?php

class SessionController {

public function restricLogin(){
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['auth'])) {
            $_SESSION['flash']['danger'] = "Accès interdit, authentification requise";
            header('Location:index.php?p=login');
            exit();
        }
    }
}
