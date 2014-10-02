<?php

class App
{
    function __construct($name, $consumptionXMinute) {
        $this->name = $name;
        $this->consumptionXMinute = $consumptionXMinute;
    }
    
      
    private $name;
    private $consumptionXMinute;
    
    public function getName() {
        return $this->name;
    }

    public function getConsumptionXMinute() {
        return $this->consumptionXMinute;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setConsumptionXMinute($consumptionXMinute) {
        $this->consumptionXMinute = $consumptionXMinute;
    }

  
}

