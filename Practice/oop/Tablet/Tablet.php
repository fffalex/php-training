<?php
require 'App.php';
abstract class Device
{
    public $batteryPercent;
    public $maxAppInMemory;
    
   
    
    abstract function getBattery();
}


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

/////RUUUUUNNN TESSS
$tablet1 = new Tablet();
$app1 = new App('Google yrome', 15);
//var_dump($app1);
$app2 = new App('Mochila Fairfox', 20);
$app3 = new App('Mochila2 Fairfox2', 20);

$tablet1->installApp($app1);
$tablet1->installApp($app2);


$tablet1->installApp($app3);
var_dump($tablet1);

$tablet1->runApp($app1, 3);
var_dump($tablet1->getBattery());

$tablet1->runApp($app2, 6);
$tablet1->uninstallApp($app2);
echo 'ACA SE RROOBO';
var_dump($tablet1);
