<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=40)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $creditCode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbCredit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $win;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $defeat;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pendingFight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rating;

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

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

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

    public function setCreditCode(string $creditCode): self
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

    public function setWin(?int $win): self
    {
        $this->win = $win;

        return $this;
    }

    public function getDefeat(): ?int
    {
        return $this->defeat;
    }

    public function setDefeat(?int $defeat): self
    {
        $this->defeat = $defeat;

        return $this;
    }

    public function getPendingFight(): ?bool
    {
        return $this->pendingFight;
    }

    public function setPendingFight(?bool $pendingFight): self
    {
        $this->pendingFight = $pendingFight;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
