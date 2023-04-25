<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'product', requirements: ['id' => '\d+'])]
    public function index(
        Product $product,
        ManagerRegistry $doctrine
    ): Response
    {
        $productManager = $doctrine->getRepository(Product::class);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $productManager->find($product)
        ]);
    }
}
