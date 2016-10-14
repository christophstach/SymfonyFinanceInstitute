<?php

/**
 * Created by PhpStorm.
 * User: Christoph Stach
 * Date: 14.10.2016
 * Time: 12:53
 */

namespace Tests\AppBundle\Service;

use AppBundle\Service\ProductManager;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ProductManagerTest extends TestCase
{
    public function testFetchProducts()
    {
        $productManager = new ProductManager(dirname(__FILE__) . '\..\Resources\data\products.json');
        $products = $productManager->fetchProducts();

        $this->assertCount(10, $products);
        $this->assertInstanceOf('AppBundle\Entity\Product', $products[0]);
    }
}