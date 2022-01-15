<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $telephone;

    #[ORM\OneToOne(targetEntity: Paiement::class, cascade: ['persist', 'remove'])]
    private $Client;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private $Paiement;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'Commande')]
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getClient(): ?Paiement
    {
        return $this->Client;
    }

    public function setClient(?Paiement $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getPaiement(): ?self
    {
        return $this->Paiement;
    }

    public function setPaiement(?self $Paiement): self
    {
        $this->Paiement = $Paiement;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
