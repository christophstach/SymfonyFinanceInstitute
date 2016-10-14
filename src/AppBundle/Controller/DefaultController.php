<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Service\ProductManager;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->forward('AppBundle:Default:products');
    }

    /**
     * returns a HTML-list of finance products
     * @Route("/products", name="products")
     */
    public function productsAction()
    {

        $products = $this
            ->get('app.product_manager')
            ->fetchProducts();

        return $this->render(':default:products.html.twig', [
            'products' => $products
        ]);
    }
}
