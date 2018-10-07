<?php


class EventsController
{

    private $_eventsManager;

    public function __construct() {
        $this->_eventsManager = new EventsManager(PDOFactory::getConnection());
    }


    public function getUpcomingEvents(){
        $events = $this->_eventsManager->getUpcomingEvents();
        return $events;
    }

    public function saveEvent($name, $description, $date){
        $this->_eventsManager->saveEvent($name, $description, $date);
    }

    public function deleteEvent($id){
        $this->_eventsManager->deleteEvent($id);
        $_SESSION['flash']['success'] = "Event deleted successfully";
    }

}