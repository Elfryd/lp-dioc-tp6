<?php

namespace App\Article;

use App\Entity\Article;
use App\Entity\ArticleStat;
use App\Entity\User;
use App\Slug\SlugGenerator;

class UpdateArticleHandler
{
    public function handle(Article $article, User $user)
    {
        $slugGenerator = new SlugGenerator();
        $slug = $slugGenerator->generate($article->getTitle());
        $article->setSlug($slug);
        $article->setUpdatedAt(new \DateTime());
        /*$articleStat = new ArticleStatsLogger();
        $articleStat->log($article,'update',$user);*/
        // Slugify le titre et met à jour la date de mise à jour de l'article
        // Log également un article stat avec pour action update.
    }
}
