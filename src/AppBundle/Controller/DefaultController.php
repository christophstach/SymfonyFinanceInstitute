<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializerBuilder;

class DefaultController extends Controller
{
    /**
     * Returns the AngularJS application
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render(':default:index.html.twig');
    }

    /**
     * Returns a HTML-list of finance products
     * @Route("/products", name="products")
     */
    public function productsAction()
    {
        $products = $this
            ->get('app.product_manager')
            ->getProducts();

        return $this->render(':default:products.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * Returns the finance products as JSON array
     * @Route("/api", name="api")
     */
    public function apiAction()
    {
        $response = new JsonResponse();
        $serializer = SerializerBuilder::create()->build();

        $products = $this
            ->get('app.product_manager')
            ->getProducts();

        $response->setJson($serializer->serialize($products, 'json'));

        return $response;
    }

}
