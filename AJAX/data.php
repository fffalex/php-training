<?php
include_once Model.php;

$provin1 = new Province('Chaco');
$provin1->addCity('Resistencia');
$provin1->addCity('Las Breñas');
$provin1->addCity('Charata');

$provin2 = new Province('Corrientes');
$provin2->addCity('Capital');
$provin2->addCity('Goya');
$provin2->addCity('Santa Lucia');

$provin3 = new Province('Misiones');
$provin3->addCity('Posadas');
$provin3->addCity('San Martin');

$provinces[] = $provin1;
$provinces[] = $provin2;
$provinces[] = $provin3;

$output = array ();

