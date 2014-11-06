<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="Provinces")
 **/
class Province
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    
    /** @Column(type="string") **/
    public $name;
    
    /**
     * @OneToMany(targetEntity="City", mappedBy="province")
     **/
    public $cities;
    
    function __construct() {
        $this->cities = new ArrayCollection();
    }

    //GET & SET
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCities() {
        return $this->cities;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function addCity($city) {
        $this->cities->add($city);
    }
    
    public function addListCities($cities)
    {
        foreach ($cities as $city) {
            $this->cities->add($city);
        }
    }
}
    



