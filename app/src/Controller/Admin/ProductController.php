<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/admin/product", name="admin_product")
     */
    public function index()
    {
        $product = new Product();
        $product->setName('iPhone');
        $product->setDescription('The best phone in the world.');
        $product->setPrice(1235.00);
        $product->setCreatedAt(Carbon::now());
        $category = new Category();
        $category->setName('Electronics');
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
