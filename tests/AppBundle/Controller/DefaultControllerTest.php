<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * tests the indexAction
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * tests the productsAction
     */
    public function productsIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/products');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * tests to apiAction
     */
    public function testApi()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"' // optional message shown on failure
        );
    }
}
