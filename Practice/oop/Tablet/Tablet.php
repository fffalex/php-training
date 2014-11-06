<?php

class Tablet extends Device
{   
    function __construct() {
        $this->maxAppInMemory = 1;
        $this->batteryPercent = 100;
        $this->appMemory = [1];
        $this->installedApp = [2];
    }
    
    private $appMemory; 
    public $installedApp;
    
    public function getAppMemory() {
        return $this->appMemory;
    }

    public function setAppMemory($appMemory) {
        $this->appMemory = $appMemory;
    }
       
    public function showInstalledApp()
    {
        return $this->installedApp;
    }
   
    public function getBattery() {
        return $this->batteryPercent;
    }
    
    public function setBattery($battery) {
        $this->batteryPercent = $battery; 
    }

        
    function installApp(App $app)
    {
        if (count($this->installedApp)<3)
        {
            $this->installedApp[] = $app;
        }else{
            echo  'You cannot install another app. Memory full old woman';
        }
    }
    
    function uninstallApp(App $app)
    {
        $index = array_search($app, $this->installedApp);
        //var_dump($index);
        unset ($this->installedApp[$index]);     
    }
    
    function runApp(App $app, $duration)
    {
        $totalConsumption = $app->getConsumptionXMinute()*$duration;
        if ($this->getBattery() > $totalConsumption)
        {
            $this->appMemory = $app;
            $batteryLvl = $this->getBattery() - $totalConsumption;
            
            $this->setBattery($batteryLvl);
            echo  "The ".$app->getName()." app is running";
        }else
            {
                echo 'The app cannot run that time with current battery level';
            }
        
    }
    
    function chargeBattery($chargeDuration)
    {
        $charge = $chargeDuration * 3;
        $this->setBattery($charge);
        if ($this->getBattery() >100)
        {
            $this->setBattery(100);
        }
        echo "Se cargo tu bata está al".$this->getBattery()." % de Battery" ;
    }
    
}