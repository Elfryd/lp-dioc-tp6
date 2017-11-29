<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 29/11/17
 * Time: 09:55
 */

namespace App\DataFixtures\ORM;

use App\Entity\Tag;
use App\Slug\SlugGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTag extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $slugify = new SlugGenerator();
        $tags = array(
            new Tag("New",$slugify->generate("New")),
            new Tag("NSFW",$slugify->generate("NSFW")),
            new Tag("Salty",$slugify->generate("Salty")),
            );
        foreach ($tags as $tag) {
            $manager->persist($tag);
        }
        $manager->flush();
    }
}