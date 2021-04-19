<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(name="idProd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCat", referencedColumnName="idCat")
     * })
     */
    private $idcat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", inversedBy="idprod")
     * @ORM\JoinTable(name="produitcommande",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idProd", referencedColumnName="idProd")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCmd", referencedColumnName="idCmd")
     *   }
     * )
     */
    private $idcmd;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcmd = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdprod(): ?int
    {
        return $this->idprod;
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

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

    /**
     * @return Collection|Commande[]
     */
    public function getIdcmd(): Collection
    {
        return $this->idcmd;
    }

    public function addIdcmd(Commande $idcmd): self
    {
        if (!$this->idcmd->contains($idcmd)) {
            $this->idcmd[] = $idcmd;
        }

        return $this;
    }

    public function removeIdcmd(Commande $idcmd): self
    {
        $this->idcmd->removeElement($idcmd);

        return $this;
    }

}
