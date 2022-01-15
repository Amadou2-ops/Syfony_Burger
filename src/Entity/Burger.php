<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Complement::class, inversedBy: 'Complement')]
    private $complement;

    #[ORM\OneToMany(mappedBy: 'burger', targetEntity: Complement::class)]
    private $Burger;

    public function __construct()
    {
        $this->Burger = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComplement(): ?Complement
    {
        return $this->complement;
    }

    public function setComplement(?Complement $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * @return Collection|Complement[]
     */
    public function getBurger(): Collection
    {
        return $this->Burger;
    }

    public function addBurger(Complement $burger): self
    {
        if (!$this->Burger->contains($burger)) {
            $this->Burger[] = $burger;
            $burger->setBurger($this);
        }

        return $this;
    }

    public function removeBurger(Complement $burger): self
    {
        if ($this->Burger->removeElement($burger)) {
            // set the owning side to null (unless already changed)
            if ($burger->getBurger() === $this) {
                $burger->setBurger(null);
            }
        }

        return $this;
    }
}
