<div class="container">

    <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Login</h2>

        <br><label for="inputEmail" class="sr-only">Username or Email</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>

        <br><label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        
        <br><button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    </form>
</div>

<?php 

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST)) {
    // Recupere ID_USER, USERNAME, PASSWORD, EMAIL (USERNAME = :USERNAME OR EMAIL = :USERNAME)
    $checkUser = new UserController();
    $verify = $checkUser->verifyUser($_POST['username'], $_POST['password']);
}

?>
