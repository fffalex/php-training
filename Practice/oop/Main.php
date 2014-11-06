<?php
require_once 'opp\bootstrap.php';

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



