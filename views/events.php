<?php
$check = new SessionController();
$check->restricLogin();
?>
<div class="container-fluid">
<div class='col-sm-5'>
    <form id="event" class="form-horizontal" action="" method="post">
	<fieldset>
	    <div class="form-group">
		<legend><strong>Enter New Event:</strong></legend>
		<label for="eventName">Event name:</label>
		<input class="form-control" type="text" name="eventName" placeholder="Event Name">
	    </div>

	    <div class="form-group">
		<label for="dateEvent">Event date:</label>
		<input type="date" class="form-control" name="dateEvent">
	    </div>

	    <div class="form-group">
		<label for="eventDescription">Event description:</label>
		<textarea class="form-control" form="event" id="eventDescription" rows="8" name="eventDescription" placeholder="Type here..."></textarea>
	    </div>

	    <button class="btn btn-primary pull-right" name="submit">Submit</button>
	</fieldset>
    </form>
</div>

<?php

echo "<h2 style='text-align:center'>Upcoming Events</h2>";

$events = new EventsController();

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'delete') {
	$events->deleteEvent($_GET['id']);
    }
}

if (isset($_POST['submit'])) {

    if ((!empty($_POST['eventName'])) && (!empty($_POST['dateEvent'])) && (!empty($_POST['eventDescription']))) {

	$addEvent = new EventsController();

	$addEvent->saveEvent(($_POST['eventName']), ($_POST['eventDescription']), ($_POST['dateEvent']));
	$_SESSION['flash']['success'] = "Event added";
    } else {

	$_SESSION['flash']['danger'] = "Please fill all the fields";
    }
}

$data = $events->getUpcomingEvents();

echo "<div class='col-sm-7'>";

foreach ($data as $upcoming) {
    
    echo "<fieldset style='text-align:center; border:1px solid lightgrey; padding:2px; margin-bottom:5px; border-radius:3px; background-color:rgba(255, 255, 255, 0.45)'>
	    <h3>" . $upcoming->NOM_EVENEMENT . " | " . $upcoming->DATE_EVENEMENT . "</h3>
	    <p>" . $upcoming->DESCRIPTION_EVENEMENT . "</p>
	    <a href='?p=events&action=delete&id=" . $upcoming->ID_EVENEMENT . "''>Delete</a>
	  </fieldset>";
}

echo"</div>"
.  "</div>";//container fluid

?>
