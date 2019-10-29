<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Form\ProductType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProductController extends AbstractController
{
     /**
     * @var Product
     */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.product.index")
     */
    public function index(): Response
    {
        $products = $this->repository->findAll();
        return $this->render('admin/products/index.html.twig', compact('products'));
    }

    /**
     * @Route("/admin/edit/{id}", name="admin.product.edit")
     * @param Product $product
     */
    public function edit(Product $product)
    {
        $form = $this->createForm(ProductType::class, $product);
        
        return $this->render('admin/products/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView()
        ]);
    }
}