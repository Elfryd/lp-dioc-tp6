<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ArticleStat
{
    /*const CREATE = 'create';
    const UPDATE = 'update';
    const VIEW = 'view';*/

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(type="string",length=10)
     */
    protected $action;
    /**
     * @var Article
     * @ORM\OneToOne(targetEntity="Article")
     */
    protected $article; //OneToOne
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $date;
    /**
     * @var string
     * @ORM\Column(type="string",length=40)
     */
    protected $ip;
    /**
     * @var User
     * @ORM\OneToOne(targetEntity="User")
     */
    protected $user;

    /**
     * ArticleStat constructor.
     * @param string $action
     * @param string $article
     * @param \DateTime $date
     * @param User $user
     */
    public function __construct($action,Article $article, \DateTime $date, User $user)
    {
        $this->action = $action;
        $this->article = $article;
        $this->date = $date;
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }




    // Uniquement des getter et un constructeur
}
