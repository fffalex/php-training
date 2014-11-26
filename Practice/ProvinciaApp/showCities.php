<?php
require '../BugTRacker/bootstrap.php';

if(isset($_GET['idprov'])){
    
   $id = $_GET['idprov'];
 
   $provinceRepository = $entityManager->getRepository('Province');
   $citiesRepository = $entityManager->getRepository('City');
   
   $return = [];
   
   $province = $provinceRepository->find($id);
   
   if (!empty($province)){
       $cities = $province->getCities();
       //var_dump($cities);
   
       foreach ($cities as $city) {
           $return[] = $city->getName();
           //var_dump($city->getName());
       }
       //var_dump($return);

       
   }
    
    header('content-type: application/json');
    echo json_encode($return);
    
    //var_dump($result);
    
}