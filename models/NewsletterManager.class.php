<?php

class NewsletterManager
{
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) { $this->_db = $db; }


    public function mailCheck($mail){

        $req = $this->_db->query("SELECT * FROM newsletter
                                  WHERE MAIL ='$mail'" ,PDO::FETCH_OBJ);

        $result = $req->fetch();
        return $result;
    }

    public function tokenCheck($mail){

        $req = $this->_db->query("SELECT TOKEN FROM newsletter
                                  WHERE MAIL ='$mail'" ,PDO::FETCH_OBJ);

        $token = $req->fetch();
        return $token;
    }

    public function updateToken($mail){

        $req = $this->_db->prepare("UPDATE newsletter
                                    set TOKEN = ?
                                    WHERE MAIL ='$mail'");

        $req->execute(array($this->strRandom(60)));
    }

    // Genere chaine aleatoire
    public function strRandom($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet , $length)) , 0 , $length);
    }

    // Enregistre le mail dans la base
    public function mailSave($mail, $token){

        $req = $this->_db->prepare("INSERT INTO newsletter (MAIL, TOKEN)
                                    VALUES ('$mail', '$token')");
        $req->execute();
    }

    // Recupere le last ID enregistré
    public function getLast(){

        $last =  $this->_db->lastInsertId();
        return $last;
    }

    public function getIdByMail($mail){
        $req = $this->_db->query("SELECT ID_NEWSLETTER FROM newsletter
                                  WHERE MAIL ='$mail'", PDO::FETCH_OBJ);

        $id = $req->fetch();
        return $id;
    }

    public function verifyUnsubscribe($id, $token){

        $req = $this->_db->query("SELECT ID_NEWSLETTER, TOKEN FROM newsletter
                                    WHERE ID_NEWSLETTER = $id
                                    AND TOKEN = '$token'");
        $verify = $req->fetch();
        return $verify;
    }

    public function resetToken($id, $token){

        $req = $this->_db->prepare("UPDATE newsletter
                                    SET TOKEN = NULL
                                    WHERE ID_NEWSLETTER = $id
                                    AND TOKEN = '$token'");
        $req->execute();
    }


}