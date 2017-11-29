<?php

namespace App\Controller;

use App\Article\CountViewUpdater;
use App\Article\NewArticleHandler;
use App\Article\UpdateArticleHandler;
use App\Article\ViewArticleHandler;
use App\Entity\Article;
use App\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(path="/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route(path="/show/{slug}", name="article_show")
     */
    public function showAction()
    {
    }

    /**
     * @Route(path="/new", name="article_new")
     */
    public function newAction(Request $request, NewArticleHandler $newArticleHandler)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $newArticleHandler->handle($article,$user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render('Article/new.html.twig',array('form' => $form->createView()));
        // Seul les auteurs doivent avoir access.
    }

    /**
     * @Route(path="/update/{slug}", name="article_update")
     */
    public function updateAction($slug, Request $request, UpdateArticleHandler $updateArticleHandler)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findOneBy(array('slug' => $slug));
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $updateArticleHandler->handle($article,$user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render('Article/update.html.twig',array('form' => $form->createView()));
        // Seul les auteurs doivent avoir access.
        // Seul l'auteur de l'article peut le modifier
    }
}
