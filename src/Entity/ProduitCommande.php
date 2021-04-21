<?php

namespace App\Entity;

use App\Repository\ProduitCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitCommandeRepository::class)
 */
class ProduitCommande {

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande")
     */
    private $commande;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit")
     */
    private $produit;

    /**
     * @ORM\Column()
     */
    private $dateCommande;
    
     /**
     * 
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    
     /**
     * 
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $statut ='en cours';

    public function getDateCommande(): ?string
    {
        return $this->dateCommande;
    }

    public function setDateCommande(string $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

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

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

}
