<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Category;

use  Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/create-category", name="create-category")
      @Method("GET")
     */
     public function create()
     {
       return $this->render('create-category.html.twig');
     }

     /**
      * @Route("/submit-category", name="submit-category")
       @Method("POST")
      */
      public function submitCategory(Request $request)
      {
        $category=new Category();
        $name=$request->request->get('name');


        $category->setName($name);


        $em=$this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();

        return $this->redirectToRoute('blog');

      }
    }
