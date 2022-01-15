<?php

namespace App\Entity;

use App\Repository\ComplementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComplementRepository::class)]
class Complement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\OneToMany(mappedBy: 'complement', targetEntity: Burger::class)]
    private $Complement;

    #[ORM\ManyToOne(targetEntity: Burger::class, inversedBy: 'Burger')]
    private $burger;

    public function __construct()
    {
        $this->Complement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection|Burger[]
     */
    public function getComplement(): Collection
    {
        return $this->Complement;
    }

    public function addComplement(Burger $complement): self
    {
        if (!$this->Complement->contains($complement)) {
            $this->Complement[] = $complement;
            $complement->setComplement($this);
        }

        return $this;
    }

    public function removeComplement(Burger $complement): self
    {
        if ($this->Complement->removeElement($complement)) {
            // set the owning side to null (unless already changed)
            if ($complement->getComplement() === $this) {
                $complement->setComplement(null);
            }
        }

        return $this;
    }

    public function getBurger(): ?Burger
    {
        return $this->burger;
    }

    public function setBurger(?Burger $burger): self
    {
        $this->burger = $burger;

        return $this;
    }
}
