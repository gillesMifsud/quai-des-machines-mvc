<?php

$check = new SessionController();
$check->restricLogin();

if(isset($_GET['id']) && isset($_GET['token'])){


    // Verif si les $_GET ID_USER & RESET TOKEN existent dans la base
    $verify = new NewsletterController();
    $check = $verify->unsubscribe(($_GET['id']), $_GET['token']);


} else {
    $_SESSION['flash']['danger'] = "Ce token n'existe pas";
    exit();
}
