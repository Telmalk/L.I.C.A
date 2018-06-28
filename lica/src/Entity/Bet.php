<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetRepository")
 */
class Bet
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
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fight")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_fight;

    /**
     * @ORM\Column(type="integer")
     */
    private $betTarget;

    /**
     * @ORM\Column(type="integer")
     */
    private $wager;

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

    public function getIdFight(): ?Fight
    {
        return $this->id_fight;
    }

    public function setIdFight(?Fight $id_fight): self
    {
        $this->id_fight = $id_fight;

        return $this;
    }

    public function getBetTarget(): ?int
    {
        return $this->betTarget;
    }

    public function setBetTarget(int $betTarget): self
    {
        $this->betTarget = $betTarget;

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
