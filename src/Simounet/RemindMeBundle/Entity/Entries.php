<?php

namespace Simounet\RemindMeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entries
 *
 * @ORM\Table(name="entries")
 * @ORM\Entity(repositoryClass="Simounet\RemindMeBundle\Repository\EntriesRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Entries
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="who", type="string", length=255)
     */
    private $who;

    /**
     * @var string
     *
     * @ORM\Column(name="what", type="string", length=255)
     */
    private $what;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set who
     *
     * @param string $who
     *
     * @return Entries
     */
    public function setWho($who)
    {
        $this->who = $who;

        return $this;
    }

    /**
     * Get who
     *
     * @return string
     */
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Set what
     *
     * @param string $what
     *
     * @return Entries
     */
    public function setWhat($what)
    {
        $this->what = $what;

        return $this;
    }

    /**
     * Get what
     *
     * @return string
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Entries
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->date = new \DateTime("now");
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Entries
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

