<?php

class ReservationController {

    public function mailOperations($name, $phone, $date, $time, $chairs, $email) {

        $_SESSION['flash'] = array();

        // Verif Name
        if (empty($name)) {

            $_SESSION['flash']['danger'] = "Enter name";

        } else {
        // Nettoyage balises HTML
        $name = htmlspecialchars($name);
        }

        // Verif phone
        if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/", $phone)){

            $_SESSION['flash']['danger'] = "Invalid phone number";
        }

        // Verif Email
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {

            $_SESSION['flash']['danger'] = "Invalid Email";
        }

        // Verif Date et Heure
        if((!isset($date)) && (!isset($time))){

            $_SESSION['flash']['danger'] = "Please chose Date and Time";
        }

        // Verif Date et Heure
        if((!isset($chairs))){

            $_SESSION['flash']['danger'] = "Please chose Seats Number";
        }

        // Si pas d'erreurs flash en session, on envoit le mail
        if(!empty($_SESSION['flash'])){

            header('Location:index.php?p=reservation');

        }

        else {

        $mail = 'contact@quaidesmachines.fr'; // Déclaration de l'adresse de destination.
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = "Demande de Reservation";
        $message_html = "
        <html>
            <head>
            </head>
                <body style='font-family: Arial'>
                    <h1>Reservation query from: $name</h1>
                    <p>Phone Number: $phone</p>
                    <p>Requested Date: $date</p>
                    <p>Requested Time: $time</p>
                    <p>Requested Seats: $chairs</p>
                    <p>Email: $email</p>
                </body>
            </html>";
        //==========

        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========

        //=====Définition du sujet.
        $sujet = "Reservation Query !";
        //=========

        //=====Création du header de l'e-mail.
        $header = "From: \"Reservation Quai Des Machines\"<contact@quaidesmachines.fr>".$passage_ligne;
        $header.= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========

        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========

        //=====Envoi de l'e-mail.
        mail($mail,$sujet,$message,$header);
        //==========
        $_SESSION['flash']['success'] = "Your reservation has been send. We will contact you soon to confirm your booking";
        }
    }
}

?>