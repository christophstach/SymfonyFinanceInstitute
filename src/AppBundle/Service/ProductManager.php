<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;

use JMS\Serializer\SerializerBuilder;

/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 13.10.2016
 * Time: 21:02
 */
class ProductManager
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var string
     */
    private $file;

    /**
     * ProductManager constructor.
     * @param $file The path to the json files including the products
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * fetched products from the json file and returns them as an sorted array of entities.
     * @return mixed
     */
    public function getProducts()
    {
        $jsonContent = file_get_contents($this->file);
        $products = $this->serializer->deserialize($jsonContent, 'array<AppBundle\Entity\Product>', 'json');

        usort($products, function (Product $a, Product $b) {
            return $b->getFigures()->getSideYieldPa() <=> $a->getFigures()->getSideYieldPa();
        });

        return $products;
    }
}