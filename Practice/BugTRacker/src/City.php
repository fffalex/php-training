<?php

/**
 * @Entity @Table(name="Cities")
 **/
class City
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    
    /** @Column(type="string") **/
    public $name;
    
    /** @Column(type="integer", nullable=true) **/
    public $postalCode;
    
    /**
     * @ManyToOne(targetEntity="Province", inversedBy="cities")
     * @JoinColumn(name="provinceId", referencedColumnName="id", nullable=false)
     **/
    public $province;
        
    public function setProvince($province) {
        $this->province = $province;
    }

        
    //GET & SET
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
    
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    
}
?>