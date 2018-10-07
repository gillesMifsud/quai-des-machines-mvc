<?php
//$check = new SessionController();
//$check->restricLogin();
?>

<div class="container-fluid">
    <div class="row">

	<div class="col-sm-12">
	    <a target="_blank" href="https://www.google.com/maps/place/Les+Machines+de+l'%C3%AEle/@47.2049586,-1.5622382,15.75z/data=!4m2!3m1!1s0x0:0xb1bb929d858aecf9?hl=fr-FR"><img src="views/css/map.jpg" style="width: 100%"></a>
<!--	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2710.562198045401!2d-1.5662296843833674!3d47.205580979160096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805eb8b82fb4c7f%3A0xb1bb929d858aecf9!2sLes+Machines+de+l&#39;%C3%AEle!5e0!3m2!1sfr!2sfr!4v1458037135311" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>    -->
	</div>

	<hr>

        <div class="col-sm-6">
	    <h2>Le Quai Des Machines</h2>
	    <address>
		<strong>Les Machines de l’île</strong><br>
		Parc des Chantiers<br>
		Boulevard Léon Bureau<br>
		44 200 Nantes<br>
		<abbr title="Phone">Phone:</abbr> +33 2 51 17 49 89
	    </address>
        </div>


	<div class="col-sm-6 ">

	    <h2>Contact Us</h2>

	    <form class="form-horizontal" method="post" action="">
		<div class="form-group">
		    <div class="col-sm-12">
			<input class="form-control" id="firstName" name="name" placeholder="Name" required="" type="text">
		    </div>
		</div>

		<div class="form-group">
		    <div class="col-sm-6">
			<input class="form-control" name="email" placeholder="Email" required="" type="email">
		    </div>
		    <div class="col-sm-6">
			<input class="form-control" name="phone" placeholder="Phone(optional)" type="text">
		    </div>
		</div>

		<div class="form-group">

		    <div class="col-sm-12">
			<textarea class="form-control" minlength="10" rows="4" name="message" placeholder="Message"></textarea>
		    </div>
		</div>

		<div class="form-group">
		    <div class="col-sm-12">
			<button class="btn btn-primary pull-right" name="submit">Submit</button>
		    </div>
		</div>
	    </form>

	</div><!--/col-sm-6-->

    </div>
</div>

<?php
if ((isset($_POST)) && (isset($_POST['submit']))) {

    if (!empty($_POST)) {


	$contact = new ContactController();
	$form = $contact->mailOperations(
	$_POST['name'],
	$_POST['email'],
	$_POST['phone'],
	$_POST['message']);
    }
}


