<?php

$check = new SessionController();
$check->restricLogin();

if(isset($_POST['mail'])){

    if(!empty($_POST['mail'])){

        $ctrl = new NewsletterController();
        $check = $ctrl->mailOperations($_POST['mail']);
    }
}
?>
<form class="form-inline" action="" method="post" id="createform">
    
    <p>Subscribe Newsletter:</p>
    
    <div class="form-group">
	<label for="mail">Mail</label>
	<input  class="form-control" id="mail" type='email' name='mail'/>
    </div>
    
    <button class="btn btn-primary" type="submit" name="submit" value="Subscribe">Subscribe</button>
</form>

