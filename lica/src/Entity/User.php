<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $creditCode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbCredit;

    /**
     * @ORM\Column(type="integer")
     */
    private $win;

    /**
     * @ORM\Column(type="integer")
     */
    private $defeat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pendingFight;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alien", mappedBy="id_user")
     */
    private $aliens;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewFight", inversedBy="user1")
     */
    private $user1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewFight", inversedBy="user2")
     */
    private $user2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BetUser", mappedBy="user")
     */
    private $betUsers;

    public function __construct()
    {
        $this->aliens = new ArrayCollection();
        $this->betUsers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCreditCode(): ?string
    {
        return $this->creditCode;
    }

    public function setCreditCode(?string $creditCode): self
    {
        $this->creditCode = $creditCode;

        return $this;
    }

    public function getNbCredit(): ?int
    {
        return $this->nbCredit;
    }

    public function setNbCredit(?int $nbCredit): self
    {
        $this->nbCredit = $nbCredit;

        return $this;
    }

    public function getWin(): ?int
    {
        return $this->win;
    }

    public function setWin(int $win): self
    {
        $this->win = $win;

        return $this;
    }

    public function getDefeat(): ?int
    {
        return $this->defeat;
    }

    public function setDefeat(int $defeat): self
    {
        $this->defeat = $defeat;

        return $this;
    }

    public function getPendingFight(): ?bool
    {
        return $this->pendingFight;
    }

    public function setPendingFight(bool $pendingFight): self
    {
        $this->pendingFight = $pendingFight;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return Collection|Alien[]
     */
    public function getAliens(): Collection
    {
        return $this->aliens;
    }

    public function addAlien(Alien $alien): self
    {
        if (!$this->aliens->contains($alien)) {
            $this->aliens[] = $alien;
            $alien->setIdUser($this);
        }

        return $this;
    }

    public function removeAlien(Alien $alien): self
    {
        if ($this->aliens->contains($alien)) {
            $this->aliens->removeElement($alien);
            // set the owning side to null (unless already changed)
            if ($alien->getIdUser() === $this) {
                $alien->setIdUser(null);
            }
        }

        return $this;
    }

    public function getUser1(): ?NewFight
    {
        return $this->user1;
    }

    public function setUser1(?NewFight $user1): self
    {
        $this->user1 = $user1;

        return $this;
    }

    public function getUser2(): ?NewFight
    {
        return $this->user2;
    }

    public function setUser2(?NewFight $user2): self
    {
        $this->user2 = $user2;

        return $this;
    }

    /**
     * @return Collection|BetUser[]
     */
    public function getBetUsers(): Collection
    {
        return $this->betUsers;
    }

    public function addBetUser(BetUser $betUser): self
    {
        if (!$this->betUsers->contains($betUser)) {
            $this->betUsers[] = $betUser;
            $betUser->setUser($this);
        }

        return $this;
    }

    public function removeBetUser(BetUser $betUser): self
    {
        if ($this->betUsers->contains($betUser)) {
            $this->betUsers->removeElement($betUser);
            // set the owning side to null (unless already changed)
            if ($betUser->getUser() === $this) {
                $betUser->setUser(null);
            }
        }

        return $this;
    }
}
