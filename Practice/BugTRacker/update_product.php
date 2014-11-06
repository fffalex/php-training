<?php
require_once "bootstrap.php";

$id = $argv[1];
$atributte = $argv[2];
$value = $argv[3];

$productRepository = $entityManager->getRepository('Product');
$product = $productRepository->find($id);

if (empty($product))
{
    echo "\n No existe le producto ingresado \n";
}else{
    if ($atributte == 'name'){
        $product->setName($value);
        $entityManager->persist($product);
        $entityManager->flush();
        echo " \n Se ha actualizado la propiedad ".$atributte . "\n";
    }
    else{
        echo " \n Atributo invalido \n";
    }
}




