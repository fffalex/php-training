<?php
require '../BugTRacker/bootstrap.php';

if(isset($_GET['inputText'])){
    $startWith = $_GET['inputText'];
    
    $query = $entityManager->createQuery('SELECT p.name, p.id FROM Province p WHERE p.name LIKE :startWith');
    $query->setParameter('startWith', $startWith.'%');
    $result = $query->getResult();
    
//    if (empty($result)){
//        $result = 'No provinces found';
//    } 
    header('content-type: application/json');
    
    echo json_encode($result);
    
    //var_dump($result);
    
}
