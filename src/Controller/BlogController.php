<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use  Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
      $repository = $this->getDoctrine()->getRepository(Blog::class);
      $blogs = $repository->findAll();

        return $this->render('blog/index.html.twig', [
            'blogs' => $blogs,
        ]);
    }

    /**
     * @Route("/create", name="create")
      @Method("GET")
     */
     public function create()
     {
       return $this->render('create.html.twig');
     }

     /**
      * @Route("/submit", name="submit")
       @Method("POST")
      */
      public function submit(Request $request)
      {
        $blog=new Blog();
        $title=$request->request->get('title');
        $author=$request->request->get('author');
        $date=$request->request->get('date');
        $content=$request->request->get('content');

        $blog->setTitle($title);
        $blog->setAuthor($author);
        $blog->setContent($content);



        $em=$this->getDoctrine()->getManager();
        $em->persist($blog);
        $em->flush();

        return $this->redirectToRoute('create');

      }

      /**
       * @Route("/show/{id}", name="show")
         @Method("GET")
       */
       public function show($id)
       {
         $repository = $this->getDoctrine()->getRepository(Blog::class);
         $blog = $repository->find($id);
         return $this->render('show.html.twig',[
           'blog'=>$blog
         ]);
       }

       /**
        * @Route("/edit/{id}", name="edit")
          @Method("GET")
        */
        public function edit($id)
        {
          $blog = $this->getDoctrine()->getRepository(Blog::class)->find($id);

          return $this->render('edit.html.twig',[
            'blog'=>$blog
          ]);
        }

        /**
         * @Route("/edit-submit/{id}", name="edit-submit")
           @Method("PUT")
         */
         public function editSubmit(Request $request, $id)
         {
           $blog = $this->getDoctrine()->getRepository(Blog::class)->find($id);
           $title=$request->request->get('title');
           $author=$request->request->get('author');
           $date=$request->request->get('date');
           $content=$request->request->get('content');

           $blog->setTitle($title);
           $blog->setAuthor($author);
           $blog->setContent($content);

           $em=$this->getDoctrine()->getManager();

           $em->flush();

           return $this->redirectToRoute('blog');
         }

         /**
          * @Route("delete/{id}", name="delete")
          * @Method("DELETE")
         */
         public function delete(Request $request, $id)
         {
           $blog = $this->getDoctrine()->getRepository(Blog::class)->find($id);

           $em=$this->getDoctrine()->getManager();
           $em->remove($blog);
           $em->flush();

           return $this->redirectToRoute('blog');
         }
}
