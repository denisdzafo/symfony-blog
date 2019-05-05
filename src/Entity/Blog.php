<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
  @ORM\Table(name="blogs")
 */
class Blog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
      return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
      return $this->title;
    }

    /**
      * @ORM\Column(type="string", length=255)
    */

    private $author;

    public function getAuthor()
    {
      return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
      * @ORM\Column(type="text")
    */

    private $content;

    public function getContent()
    {
      return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }



}
