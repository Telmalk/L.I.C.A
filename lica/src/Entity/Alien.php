<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlienRepository")
 */
class Alien
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="aliens")
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $race;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $origin;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $nutritions;

    /**
     * @ORM\Column(type="integer")
     */
    private $attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $speed;

    /**
     * @ORM\Column(type="integer")
     */
    private $threat;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description_card;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $trait;

    /**
     * @ORM\Column(type="integer")
     */
    private $win;

    /**
     * @ORM\Column(type="integer")
     */
    private $defeat;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $healthStatus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adopted;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fight", inversedBy="user1")
     */
    private $fight;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewFight", inversedBy="alien1")
     */
    private $alien1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewFight", inversedBy="alien2")
     */
    private $alien2;

    public function getId()
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getNutritions(): ?string
    {
        return $this->nutritions;
    }

    public function setNutritions(string $nutritions): self
    {
        $this->nutritions = $nutritions;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getThreat(): ?int
    {
        return $this->threat;
    }

    public function setThreat(int $threat): self
    {
        $this->threat = $threat;

        return $this;
    }

    public function getDescriptionCard(): ?string
    {
        return $this->description_card;
    }

    public function setDescriptionCard(string $description_card): self
    {
        $this->description_card = $description_card;

        return $this;
    }

    public function getTrait(): ?string
    {
        return $this->trait;
    }

    public function setTrait(string $trait): self
    {
        $this->trait = $trait;

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

    public function getHealthStatus(): ?string
    {
        return $this->healthStatus;
    }

    public function setHealthStatus(string $healthStatus): self
    {
        $this->healthStatus = $healthStatus;

        return $this;
    }

    public function getAdopted(): ?bool
    {
        return $this->adopted;
    }

    public function setAdopted(bool $adopted): self
    {
        $this->adopted = $adopted;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFight(): ?Fight
    {
        return $this->fight;
    }

    public function setFight(?Fight $fight): self
    {
        $this->fight = $fight;

        return $this;
    }

    public function getAlien1(): ?NewFight
    {
        return $this->alien1;
    }

    public function setAlien1(?NewFight $alien1): self
    {
        $this->alien1 = $alien1;

        return $this;
    }

    public function getAlien2(): ?NewFight
    {
        return $this->alien2;
    }

    public function setAlien2(?NewFight $alien2): self
    {
        $this->alien2 = $alien2;

        return $this;
    }
}
