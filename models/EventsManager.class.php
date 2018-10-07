<?php

class EventsManager
{
    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb($db) { $this->_db = $db; }


    public function getUpcomingEvents(){

        $req = $this->_db->query("SELECT * FROM evenement
                                  ORDER BY DATE_EVENEMENT DESC
                                  LIMIT 5" ,PDO::FETCH_OBJ);
        $events = $req->fetchAll();
        return $events;
    }

    public function saveEvent($name, $description, $date){
        $req = $this->_db->prepare("INSERT INTO evenement (NOM_EVENEMENT, DESCRIPTION_EVENEMENT, DATE_EVENEMENT)
                                  VALUES (?, ?, ?)");
        $req->execute(array($name, $description, $date));

    }


    public function deleteEvent($id){

        $req = $this->_db->prepare("DELETE FROM evenement
                                    WHERE ID_EVENEMENT = $id");
        $req->execute();
    }

}