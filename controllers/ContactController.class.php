<?php

class ContactController {
    
    public function mailOperations($name, $email, $phone, $message) {

        $_SESSION['flash'] = array();
        
	// Verif Name
        if (empty($name)) {

            $_SESSION['flash']['danger'] = "Enter name";
	    
	    if (empty($message)) {
		
		$_SESSION['flash']['danger'] = "Enter message";
	    }

        } else {
        // Nettoyage balises HTML
        $name = htmlspecialchars($name);
	$email = htmlspecialchars($email);
	$phone = htmlspecialchars($phone);
	$message = htmlspecialchars($message);
        }

        // Verif phone
        if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/", $phone)){

            $_SESSION['flash']['danger'] = "Invalid phone number";
        }

        // Verif Email
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {

            $_SESSION['flash']['danger'] = "Invalid Email";
        }

        

        // Si pas d'erreurs flash en session, on envoit le mail
        if(!empty($_SESSION['flash'])){

            header('Location:index.php?p=contact');

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
        $message_txt = "Contact from Quai des Machines";
        $message_html = "
        <html>
            <head>
            </head>
                <body style='font-family: Arial'>
                    <h1>Contact name: $name</h1>
                    <p>Phone Number: $phone</p>
                    <p>Email: $email</p>
		    <p>Message: $message</p>
                </body>
            </html>";
        //==========

        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========

        //=====Définition du sujet.
        $sujet = "New Contact Query !";
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
        $_SESSION['flash']['success'] = "Thank you for contacting us. We will answer to you soon.";
        }
    }
}
