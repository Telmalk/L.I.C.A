<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Alien")
     */
    private $alien1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Alien")
     */
    private $alien2;

    /**
     * @ORM\Column(type="integer")
     */
    private $bet;

    /**
     * @ORM\Column(type="integer")
     */
    private $odd_fighter1;

    /**
     * @ORM\Column(type="integer")
     */
    private $odd_fighter2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accepted;

    public function getId()
    {
        return $this->id;
    }

    public function getUser1(): ?User
    {
        return $this->user1;
    }

    public function setUser1(?User $user1): self
    {
        $this->user1 = $user1;

        return $this;
    }

    public function getUser2(): ?User
    {
        return $this->user2;
    }

    public function setUser2(?User $user2): self
    {
        $this->user2 = $user2;

        return $this;
    }

    public function getAlien1(): ?Alien
    {
        return $this->alien1;
    }

    public function setAlien1(?Alien $alien1): self
    {
        $this->alien1 = $alien1;

        return $this;
    }

    public function getAlien2(): ?Alien
    {
        return $this->alien2;
    }

    public function setAlien2(?Alien $alien2): self
    {
        $this->alien2 = $alien2;

        return $this;
    }

    public function getBet(): ?int
    {
        return $this->bet;
    }

    public function setBet(int $bet): self
    {
        $this->bet = $bet;

        return $this;
    }

    public function getOddFighter1(): ?int
    {
        return $this->odd_fighter1;
    }

    public function setOddFighter1(int $odd_fighter1): self
    {
        $this->odd_fighter1 = $odd_fighter1;

        return $this;
    }

    public function getOddFighter2(): ?int
    {
        return $this->odd_fighter2;
    }

    public function setOddFighter2(int $odd_fighter2): self
    {
        $this->odd_fighter2 = $odd_fighter2;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAccepted(): ?bool
    {
        return $this->accepted;
    }

    public function setAccepted(bool $accepted): self
    {
        $this->accepted = $accepted;

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return (string)$this->getId();
    }
}
