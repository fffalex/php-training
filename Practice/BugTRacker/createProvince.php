<?php
require_once "bootstrap.php";

$insertedCounter = 0;

$provinceStr = $argv[1];
//Array that would contain cities names
$citiesOfNewProvince = [];

//Fill the Array with the cities names
for ($i = 2; $i < count($argv); $i++) {
    $citiesOfNewProvince[] = $argv[$i]; 
}    

//Create Repositories
$provinceRepository = $entityManager->getRepository('Province');
$citiesRepository = $entityManager->getRepository('City');

//Check if the province already exist on DB 
$criteria = array ('name'=>$provinceStr);
$province = $provinceRepository->findOneBy($criteria);
//If doesnt exist must create a new province
if (empty($province))
{
    $province = new Province();
    $province->setName($provinceStr);
    echo "\n ^^ The Province ".$provinceStr." was created \n";
}else{
    echo "\n !! The Province ".$provinceStr." already exists on DB \n";
}

//Check if some cities already exist on DB
foreach ($citiesOfNewProvince as $cityName) {
    
    //Search the cities of the current province
    $criteria = array ('name'=>$cityName, 'province'=>$province->id);
    $city = $citiesRepository->findOneBy($criteria);
    
    //If city doesnt exist must create one 
    if (empty($city))
        {
            $city = new City();
            $city->setName($cityName);
            echo "\n ^^ The City ".$cityName." was created \n";
            
            $insertedCounter += 1;
            
        }  else {
            echo "\n !! The City ".$cityName." already exists on DB \n";
        }
    //add City to the current Province & and reference this province on the city    
    $province->addCity($city);
    $city->setProvince($province);
    
    //add city to persist
    $entityManager->persist($city);
        
}

//add province to persist
$entityManager->persist($province);
//SAVE CHANGES ON DB

$entityManager->flush();

echo "\n ****** FINISHED! Your new Province and Cities should be created\n";
echo "\n *** Province ".$province->getName()." has ID: ".$province->id. "\n";
echo "\n *** Number of cities inserted on DB: ".$insertedCounter."\n";

