<?php

class WeekMealsManager {
    
    private $_db;
    
    public function __construct($db) {
        $this->setDb($db);
    }
    
    public function setDb($db) { $this->_db = $db; }
    
    /*
     * Prends un tableau de String correspondant aux plats de la semaine.
     * Crée un nouvel enregistrement à partir de lundi suivant.
     */
    public function createNextWeekMeals(array $plats) {
        $plats = cleanArray($plats);

        $req = $this->_db->prepare("INSERT INTO semaine (lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche, num_semaine)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute($plats);
    }

    // Recupere le menu de la semaine en fonction de son id (methode $_GET)
    public function getWeekMealsById($id) {

        $req = $this->_db->query("SELECT * FROM semaine
                                  WHERE NUM_SEMAINE = $id" ,PDO::FETCH_OBJ);
        $plats = $req->fetch();
        return $plats;
    }

    // Mise a jour des plats d'une semaine donnée
    public function updateWeekMeals(array $plats){

        $plats = cleanArray($plats);
        $req = $this->_db->prepare("UPDATE semaine
                                    SET LUNDI = ?,
                                        MARDI = ?,
                                        MERCREDI = ?,
                                        JEUDI = ?,
                                        VENDREDI = ?,
                                        SAMEDI = ?,
                                        DIMANCHE = ?
                                  WHERE NUM_SEMAINE = ?");
        $req->execute($plats);
    }

    // Recupere les ID de semaine sous forme de str
    public function getWeekNumbers(){

        $req = $this->_db->query("SELECT NUM_SEMAINE FROM semaine" ,PDO::FETCH_OBJ);
        $numbers = array();
        while ($week = $req->fetch()) {
            array_push($numbers, $week->NUM_SEMAINE);
        }
        return $numbers;
    }

}
?>
