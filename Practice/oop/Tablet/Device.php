<?php
namespace Tablet;

abstract class Device
{
    public $batteryPercent;
    public $maxAppInMemory;
    
   
    
    abstract function getBattery();
}
