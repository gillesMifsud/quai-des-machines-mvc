<?php 
$check = new SessionController();
$check->restricLogin();
?>
<form class="form-horizontal" action="" method="post" >
    <fieldset>

        <!-- Form Name -->
        <legend style="text-align: center">Reservation</legend>

        <!-- Nom-->
        <div class="form-group">
            <label class="col-md-5 control-label" for="textinput">Name</label>
            <div class="col-md-5">
                <input id="textinput" name="name" type="text" placeholder="Enter your name" class="form-control input-md" required="required">
            </div>
        </div>

        <!-- Phone-->
        <div class="form-group">
            <label class="col-md-5 control-label" for="phone">Phone Number</label>
            <div class="col-md-5">
                <input id="phone" name="phone" type="tel" placeholder="Enter your phone number" class="form-control input-md" required="required">
            </div>
        </div>

        <!-- Date -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="date">Pick a Date</label>
            <div class="col-md-5">
                <input id="date" name="date" type="date"  class="form-control input-md" required="required">
            </div>
        </div>

        <!-- Time -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="time">Pick a Time</label>
            <div class="col-md-5">
                <input id="time" name="time" type="time"  class="form-control input-md" required="required">
            </div>
        </div>

        <!-- Nb personnes -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="chairs">Number of Chairs</label>
            <div class="col-md-5">
                <input id="chairs" name="chairs" type="number"  min="1" max="10" class="form-control input-md" required="required">
            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="email">Email Adress</label>
            <div class="col-md-5">
                <input id="email" name="email" type="email"  class="form-control input-md" placeholder="Enter your Email Adress" required="required">
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-5 control-label" for="submit"></label>
            <div class="col-md-5">
                <button id="submit" name="submit" class="btn btn-primary pull-right">Submit reservation</button>
            </div>
        </div>

    </fieldset>
</form>
<?php

if(isset($_POST)){

    if(!empty($_POST)){


        $reservation = new ReservationController();
        $validation = $reservation->mailOperations(
                                            $_POST['name'],
                                            $_POST['phone'],
                                            $_POST['date'],
                                            $_POST['time'],
                                            $_POST['chairs'],
                                            $_POST['email']);
    }
}
