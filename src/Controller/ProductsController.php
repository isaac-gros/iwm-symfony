<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    /**
     * Le répertoire des produits
     */
    private $repository;

    /**
     * @Route("/products", name="products")
     * @return Response
     */
    public function index(ProductRepository $repository): Response
    {
        $products = $repository->findAll();
        return $this->render('products/products.html.twig', [
            'current_menu' => 'products',
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/{slug}-{id}", name="product.show")
     */
    public function single(Product $product, string $slug): Response
    {

        if($product->getSlug() !== $slug) {
            return $this->redirectToRoute('product.show', [
                'id' => $product->getId(),
                'slug' => $product->getSlug()
            ], 301);
        }

        return $this->render('products/show.html.twig', [
            'current_menu' => 'product',
            'product' => $product
        ]);
    }
}