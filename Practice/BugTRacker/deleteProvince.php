<?php

require_once "bootstrap.php";

$provinceStr = $argv[1];
$provinceRepository = $entityManager->getRepository('Province');

$criteria = array ('name'=>$provinceStr);
$province = $provinceRepository->findOneBy($criteria);

if (empty($province))
{
    echo 'The province doesnt exist on the DB';
}  else {
    $provinceRepository
}



