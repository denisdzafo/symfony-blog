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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
      * @ORM\Column(type="string", length=255)
    */

    private $author;

    /**
      * @ORM\Column(type="text")
    */

    private $content;

    /**
     * @ORM\Column(type="datetime")
     */

    private $date;

}
