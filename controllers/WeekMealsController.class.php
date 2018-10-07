<?php

class WeekMealsController {
    
    private $_weekMealsManager;
    
    public function __construct() {
        $this->_weekMealsManager = new WeekMealsManager(PDOFactory::getConnection());
    }
    
    public function createNextWeekMeals(array $plats) {
        $this->_weekMealsManager->createNextWeekMeals($plats);
    }
    
    public function getWeekMealsById($id) {
        $meals = $this->_weekMealsManager->getWeekMealsById($id);
        return $meals;
    }

    public function updateWeekMeals(array $plats){
        $this->_weekMealsManager->updateWeekMeals($plats);
    }

    public function getweekNumbers(){
        $weeks = $this->_weekMealsManager->getWeekNumbers();
        return $weeks;
    }
}
?>
