<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\ProductManager;
use JMS\Serializer\SerializerBuilder;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $products = $this
            ->get('app.product_manager')
            ->fetchProducts();

        return $this->render(':default:index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * returns a HTML-list of finance products
     * @Route("/api/products", name="products")
     */
    public function productsAction()
    {
        $response = new JsonResponse();
        $serializer = SerializerBuilder::create()->build();

        $products = $this
            ->get('app.product_manager')
            ->fetchProducts();

        $response->setJson($serializer->serialize($products, 'json'));

        return $response;
    }
}
