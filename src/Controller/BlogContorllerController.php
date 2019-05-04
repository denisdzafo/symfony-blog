<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogContorllerController extends AbstractController
{
    /**
     * @Route("/blog/contorller", name="blog_contorller")
     */
    public function index()
    {
        return $this->render('blog_contorller/index.html.twig', [
            'controller_name' => 'BlogContorllerController',
        ]);
    }
}
