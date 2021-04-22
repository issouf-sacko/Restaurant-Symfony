<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="I_FK_ProduitCategorie", columns={"idCat"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="rupture", type="boolean", nullable=true)
     */
    private $rupture = '0';

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCat", referencedColumnName="idCat")
     * })
     */
    private $idcat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getRupture(): ?bool
    {
        return $this->rupture;
    }

    public function setRupture(?bool $rupture): self
    {
        $this->rupture = $rupture;

        return $this;
    }

    public function getIdcat(): ?Categorie
    {
        return $this->idcat;
    }

    public function setIdcat(?Categorie $idcat): self
    {
        $this->idcat = $idcat;

        return $this;
    }


    private $photo;
    
    function getPhoto() {
        return $this->photo;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }


    public function __toString() {
        
        return $this->libelle.' '. $this->prix;
    }

}
