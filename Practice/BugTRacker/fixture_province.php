<?php

 include "bootstrap.php";
 require '../ProvinciaApp/lib/fileToArray1.php';
 
 $input = fileToArray('../ProvinciaApp/lib/provinces.txt');
 
 $provinceRepository = $entityManager->getRepository('Province');
 $citiesRepository = $entityManager->getRepository('City');
 
 if (!empty($input)){
     
     foreach ($input as $provinceStr => $cities) {
         $criteria = array ('name'=>$provinceStr);
         $province = $provinceRepository->findOneBy($criteria);
         if (empty($province)){
            $province = new Province();
            $province->setName($provinceStr);
            echo "\n ^^ The Province ".$provinceStr." was created <br>";
        }else{
            echo "\n !! The Province ".$provinceStr." already exists on DB <br>";
        }
        
        foreach ($cities as $cityName) {
             $criteria = array ('name'=>$cityName, 'province'=>$province->id);
             $city = $citiesRepository->findOneBy($criteria);
            //If city doesnt exist must create one 
            if (empty($city))
                {
                    $city = new City();
                    $city->setName($cityName);
                    echo "\n ^^ The City ".$cityName." was created <br>";
                }  else {
                    echo "\n !! The City ".$cityName." already exists on DB <br>";
                }
            $province->addCity($city);
            $city->setProvince($province);
            $entityManager->persist($city);
            }
        $entityManager->persist($province);
        $entityManager->flush();    
        }
        echo "\n ****** FINISHED! Your new Province and Cities should be created\n";
     }
      
     
 

