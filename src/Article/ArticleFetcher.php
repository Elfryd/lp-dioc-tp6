<?php

namespace App\Article;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Registry;

class ArticleFetcher
{
    private $registry;

    /**
     * ArticleFetcher constructor.
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    public function fetch() : array
    {
        $articles = array();
        // Retourne les 10 derniers articles.
        // La limit (ici 10) doit provenir d'une variable d'env.
        return [];
    }
}
