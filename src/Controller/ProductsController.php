<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('products/products.html.twig', [
            'current_menu' => 'products'
        ]);
    }
}