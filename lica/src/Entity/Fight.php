<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FightRepository")
 */
class Fight
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alien", mappedBy="fight")
     */
    private $user1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alien", mappedBy="fight")
     */
    private $user2;

    public function __construct()
    {
        $this->user1 = new ArrayCollection();
        $this->user2 = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|Alien[]
     */
    public function getUser1(): Collection
    {
        return $this->user1;
    }

    public function addUser1(Alien $user1): self
    {
        if (!$this->user1->contains($user1)) {
            $this->user1[] = $user1;
            $user1->setFight($this);
        }

        return $this;
    }

    public function removeUser1(Alien $user1): self
    {
        if ($this->user1->contains($user1)) {
            $this->user1->removeElement($user1);
            // set the owning side to null (unless already changed)
            if ($user1->getFight() === $this) {
                $user1->setFight(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Alien[]
     */
    public function getUser2(): Collection
    {
        return $this->user2;
    }

    public function addUser2(Alien $user2): self
    {
        if (!$this->user2->contains($user2)) {
            $this->user2[] = $user2;
            $user2->setFight($this);
        }

        return $this;
    }

    public function removeUser2(Alien $user2): self
    {
        if ($this->user2->contains($user2)) {
            $this->user2->removeElement($user2);
            // set the owning side to null (unless already changed)
            if ($user2->getFight() === $this) {
                $user2->setFight(null);
            }
        }

        return $this;
    }
}
