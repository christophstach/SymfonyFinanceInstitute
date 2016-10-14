<?php

namespace AppBundle\Service;

use AppBundle\Entity\Company;
use AppBundle\Entity\Derivative;
use AppBundle\Entity\FigureSet;
use AppBundle\Entity\IdentifierSet;
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
    public function fetchProducts()
    {
        $jsonContent = file_get_contents($this->file);
        $products = $this->serializer->deserialize($jsonContent, 'array<AppBundle\Entity\Product>', 'json');

        usort($products, function (Product $a, Product $b) {
            return $b->getFigures()->getSideYieldPa() <=> $a->getFigures()->getSideYieldPa();
        });

        return $products;
    }

    /**
     * Builds a test array of a product and converts it to a json string.
     * @return string
     */
    public function buildProducts()
    {
        $ids = new IdentifierSet();
        $ids->setIsin('ISIN');
        $ids->setVwd('VWD');
        $ids->setWkn('WKN');

        $figures = new FigureSet();
        $figures->setSideYield(55.3222);
        $figures->setSideYieldPa(20.111);

        $company1 = new Company();
        $company1->setName('BMW AG');

        $company2 = new Company();
        $company2->setName('Mercedes');

        $derivative = new Derivative();
        $derivative->setIssuer($company1);
        $derivative->setUnderlying($company2);


        $product1 = new Product();
        $product1->setId('ABC');
        $product1->setDerived($derivative);
        $product1->setIds($ids);
        $product1->setFigures($figures);

        return $this->serializer->serialize([$product1], 'json');

    }
}