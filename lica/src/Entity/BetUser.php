<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetUserRepository")
 */
class BetUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="betUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $odd_fighter;

    /**
     * @ORM\Column(type="integer")
     */
    private $wager;

    public function getId()
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOddFighter(): ?int
    {
        return $this->odd_fighter;
    }

    public function setOddFighter(int $odd_fighter): self
    {
        $this->odd_fighter = $odd_fighter;

        return $this;
    }

    public function getWager(): ?int
    {
        return $this->wager;
    }

    public function setWager(int $wager): self
    {
        $this->wager = $wager;

        return $this;
    }
}
