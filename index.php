<?php
// Démarre la session dans le cas ou elle n est pas démarrée
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

header('content-type : text/html; charset="UTF-8"');
mb_internal_encoding("UTF-8");


// Front Controller
require 'lib/Autoloader.php';
require 'lib/lib.php';


if(isset($_GET['p'])) {
    $p = $_GET['p'];
}
else {
    $p = 'login';
}



//plutot que de require les pages, on execute et stocke le resultat dans une variable
ob_start();
//tout ce qui suit est stocké dans une variable
if($p === 'contact') {
    require 'views/contact.php';
}

if($p === 'login') {
    require 'views/login.php';
}

if($p === 'logout') {
    unset($_SESSION['auth']);
    $_SESSION['flash']['success'] = "Deconnexion réussie";
    header('Location:index.php?p=login');
}

if($p === 'home') {
    require 'views/home.php';
}

elseif($p === 'events') {
    require 'views/events.php';
}

elseif($p === 'newsletter') {
    require 'views/newsletter.php';
}

elseif($p === 'reservation') {
    require 'views/reservation.php';
}

elseif($p === 'planning') {
    require 'views/weekmealsplanning.php';
}

elseif($p === 'mealsmodify') {
    require 'views/weekmealsmodify.php';
}

elseif($p === 'mealscreate') {
    require 'views/weekmealscreate.php';
}

elseif($p === 'unsubscribe') {
    require 'views/unsubscribe.php';
}

$content = ob_get_clean();

//require du layout ou se trouve $content
require 'templates/header.php';

?>