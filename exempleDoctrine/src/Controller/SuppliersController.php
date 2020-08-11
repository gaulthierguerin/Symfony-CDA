<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuppliersController extends AbstractController
{
    /**
     * @Route("/suppliers", name="suppliers")
     */
    public function index()
    {
        return $this->render('suppliers/index.html.twig', [
            'controller_name' => 'SuppliersController',
        ]);
    }
}
