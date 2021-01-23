<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route("/admin/product", name: "admin_product", methods: ["GET"])]
    public function index(): Response
    {
        $product = new Product();
        $product->setName( name: 'iPhone' );
        $product->setDescription( description: 'The best phone in the world.' );
        $product->setPrice(1235.00);

        $category = new Category();
        $category->setName( name: 'Electronics' );
        $category->addProduct($product);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->persist($category);
        $entityManager->flush();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
