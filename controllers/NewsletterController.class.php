<?php


class NewsletterController
{

    private $_newsletterManager;

    public function __construct() {
        $this->_newsletterManager = new NewsletterManager(PDOFactory::getConnection());
    }


    public function mailOperations($mail){

        if (isset($mail)) {
            // Nettoyage balises HTML que le visiteur a pu rentrer
            $mail = htmlspecialchars($mail);
        }

        // Verif Email
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
            $_SESSION['flash']['danger'] = "Invalid email";
            return;
        }

        // Verifie existence de l'Email dans la base
        $result = $this->_newsletterManager->mailCheck($mail);

        // Si pas dans la base on le crée avec un token
        if($result == false){

            // Generation du token
            $token = $this->_newsletterManager->strRandom(60);
            // Enregistrement dans la bdd
            $this->_newsletterManager->mailSave($mail, $token);
            // Recup Last ID DB Record
            $lastId = $this->_newsletterManager->getLast();
            // Generation du mail de confirmation contenant le lien de desinscription
            mail($mail, 'Confirmation insription newsletter "Le Quai Des Machines"' , "Pour vous désinscrire cliquez ici: http://localhost/gil/Quai Des Machines - MVC/index.php?p=unsubscribe&id=".$lastId."&token=$token");
            // msg success
            $_SESSION['flash']['success'] = "Votre inscription a bien été prise en compte";
        }
        // Si il est dans la base SANS token (veut donc se réinscrire)
        else {
            $token = $this->_newsletterManager->tokenCheck($mail)->TOKEN;

            if(empty($token)){
                $this->_newsletterManager->updateToken($mail);
                $id = $this->_newsletterManager->getIdByMail($mail)->ID_NEWSLETTER;
                mail($mail, 'Confirmation insription newsletter "Le Quai Des Machines"' , "Pour vous désinscrire cliquez ici: http://localhost/gil/Quai Des Machines - MVC/index.php?p=unsubscribe&id=".$id."&token=$token");
                $_SESSION['flash']['success'] = "Email updaté avec succès";
            }
            else {
                // Sinon c'est qu'il y a deja un email avec un token renseigné avec cet email
                $_SESSION['flash']['danger'] = "Email déja pris"; // Email déja existant
                return;
            }
        }
    }


    public function unsubscribe($id, $token){

        if($match = $this->_newsletterManager->verifyUnsubscribe($id, $token)){

            $this->_newsletterManager->resetToken($id, $token);
            $_SESSION['flash']['success'] = "Désabonnement validé";;

        } else {

            $_SESSION['flash']['danger'] = "Invalid token";
        }
    }
}