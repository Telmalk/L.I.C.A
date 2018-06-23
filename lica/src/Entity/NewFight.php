<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewFightRepository")
 */
class NewFight
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="user1")
     */
    private $user1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="user2")
     */
    private $user2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alien", mappedBy="alien1")
     */
    private $alien1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alien", mappedBy="alien2")
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

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $winner;

    public function __construct()
    {
        $this->user1 = new ArrayCollection();
        $this->user2 = new ArrayCollection();
        $this->alien1 = new ArrayCollection();
        $this->alien2 = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser1(): Collection
    {
        return $this->user1;
    }

    public function addUser1(User $user1): self
    {
        if (!$this->user1->contains($user1)) {
            $this->user1[] = $user1;
            $user1->setUser1($this);
        }

        return $this;
    }

    public function removeUser1(User $user1): self
    {
        if ($this->user1->contains($user1)) {
            $this->user1->removeElement($user1);
            // set the owning side to null (unless already changed)
            if ($user1->getUser1() === $this) {
                $user1->setUser1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser2(): Collection
    {
        return $this->user2;
    }

    public function addUser2(User $user2): self
    {
        if (!$this->user2->contains($user2)) {
            $this->user2[] = $user2;
            $user2->setUser2($this);
        }

        return $this;
    }

    public function removeUser2(User $user2): self
    {
        if ($this->user2->contains($user2)) {
            $this->user2->removeElement($user2);
            // set the owning side to null (unless already changed)
            if ($user2->getUser2() === $this) {
                $user2->setUser2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Alien[]
     */
    public function getAlien1(): Collection
    {
        return $this->alien1;
    }

    public function addAlien1(Alien $alien1): self
    {
        if (!$this->alien1->contains($alien1)) {
            $this->alien1[] = $alien1;
            $alien1->setAlien1($this);
        }

        return $this;
    }

    public function removeAlien1(Alien $alien1): self
    {
        if ($this->alien1->contains($alien1)) {
            $this->alien1->removeElement($alien1);
            // set the owning side to null (unless already changed)
            if ($alien1->getAlien1() === $this) {
                $alien1->setAlien1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Alien[]
     */
    public function getAlien2(): Collection
    {
        return $this->alien2;
    }

    public function addAlien2(Alien $alien2): self
    {
        if (!$this->alien2->contains($alien2)) {
            $this->alien2[] = $alien2;
            $alien2->setAlien2($this);
        }

        return $this;
    }

    public function removeAlien2(Alien $alien2): self
    {
        if ($this->alien2->contains($alien2)) {
            $this->alien2->removeElement($alien2);
            // set the owning side to null (unless already changed)
            if ($alien2->getAlien2() === $this) {
                $alien2->setAlien2(null);
            }
        }

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

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(string $winner): self
    {
        $this->winner = $winner;

        return $this;
    }
}
