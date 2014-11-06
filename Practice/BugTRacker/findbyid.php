<?php
require_once "bootstrap.php";

$id = $argv[1];
$productRepository = $entityManager->getRepository('Product');
$productid = $productRepository->findById($id);

//var_dump($productid);
if (empty($productid))
{
    echo 'No existe producto';
}
else{
    echo 'El nombre es: '. $productid[0]->getName();
}

