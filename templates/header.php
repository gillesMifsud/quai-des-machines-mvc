<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>Back Office Quai des Machines</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container" style="margin-top: 10px">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                
                <?php if(isset($_SESSION['auth'])) {
                 echo '
                  <li role="presentation" class="active"><a href="index.php?p=home">Home</a></li>
                  <li role="presentation"><a href="index.php?p=planning">Planning</a></li>
                  <li role="presentation"><a href="index.php?p=events">Events</a></li>
                  <li role="presentation"><a href="index.php?p=logout">Logout</a></li>
                  ';

                 } else {
                 unset($_SESSION['auth']);
                 echo '
                     <li role="presentation"><a href="index.php?p=login">Login</a></li>';
                 }
                 ?>
                
            </ul>
        </nav>
        <h3 class="text-muted">Admin Quai Des Machines</h3>
    </div>

    <?php

    // Affiche les erreurs de $_SESSION['flash']
    if(isset($_SESSION['flash'])) {

        foreach ($_SESSION['flash'] as $typeFlash=>$message) {

            if($message=="danger"){

                foreach($message as $error){

                    echo '<div class="alert alert-' . $typeFlash . '">' . $error . '</div>';
                }
            }
            else{
                echo '<div class="alert alert-' . $typeFlash . '">' . $message . '</div>';
            }
            unset($_SESSION['flash']);
        }
    }
    ?>

    <div class="jumbotron">

        <?= $content ?>

    </div>


    <footer class="footer">
        <p>&copy; 2016 ElanFuckingTeamOfBastards, Inc.</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>