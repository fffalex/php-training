<?php
require_once "bootstrap.php";

$newCity = $argv[1];
$newProvince = $argv[2];

$city = new City();
$city->setName($newCity);

$provinceRepository = $entityManager->getRepository('Province');
$criteria = array ('name'=>$newProvince);
$provinceID = $provinceRepository->findOneBy($criteria);

$province = new Province();
$province->setName($newProvince);
$province->addCities($city);

$city->setProvince($province);
$entityManager->persist($city);
$entityManager->persist($province);
$entityManager->flush();

echo "Created Product with ID: " . $province->getId() . "\n";