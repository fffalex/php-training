<?php
require_once "bootstrap.php";

$id = $argv[1];

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach  ($products as $product)
{
    echo sprintf("-%s\n",$product->getName());
    
}





