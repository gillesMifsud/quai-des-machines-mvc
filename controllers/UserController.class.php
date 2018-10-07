<?php

class UserController {

    //put your code here

    private $_userManager;

    public function __construct() {
        $this->_userManager = new UserManager(PDOFactory::getConnection());
    }

    public function verifyUser($username, $password) {

        $bddUser = $this->_userManager->checkUser($username, $password);


        if (($bddUser->USERNAME == $username) && ($bddUser->PASSWORD == $password)) {


            // Pass en session ID_USER
            $_SESSION['auth'] = $bddUser->ID_USER;
            $_SESSION['flash']['success'] = 'Connexion réussie';
            // Puis redirection vers le compte en tant que connecté
            header('Location:index.php?p=home');
        } else {
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
            header('Location:index.php?p=login');
            exit();
        }
    }

}
