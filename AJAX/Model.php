<?php

class Province {
    
    function __construct($name) {
        $this->name = $name;
    }
    
    public $name;
    public $cities = [];
    
    public function getName() {
        return $this->name;
    }
    
    public function getCities() {
        return $this->cities;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCities($cities) {
        $this->cities = $cities;
    }
    
    public function addCity(City $city){
        $this->cities[] = $city;
    }
}

class City {
    function __construct($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

        
    public $name;

    
    
}




