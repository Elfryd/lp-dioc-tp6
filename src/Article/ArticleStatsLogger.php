<?php

namespace App\Article;

use App\Entity\Article;
use App\Entity\ArticleStat;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class ArticleStatsLogger
{
    private $registry;
    private $requestStack;
    private $tokenStorage;

    /**
     * ArticleStatsLogger constructor.
     * @param $registry
     * @param $requestStack
     * @param $tokenStorage
     */
    public function __construct(Registry $registry,RequestStack $requestStack ,TokenStorage $tokenStorage)
    {
        $this->registry = $registry;
        $this->requestStack = $requestStack;
        $this->tokenStorage = $tokenStorage;
    }


    public function log(Article $article, string $action, User $user): void
    {
        if($action === 'create')
        {
            $articleStat = new ArticleStat($action,$article,$article->getCreatedAt(),$user);
        }
        elseif ($action === 'update')
        {
            $articleStat = new ArticleStat($action,$article,$article->getUpdatedAt(),$user);
        }

        // Créer un article stat et le persist.
    }
}
