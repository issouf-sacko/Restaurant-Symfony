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
    
    private $photo;

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
    
    function getPhoto() {
        return $this->photo;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }

    public function __toString() {
        return $this->libelle.' '.$this->prix.' '.$this->image;
    }

        /*
     * $file = $produit->getImage();
            $fileName = $produit->getLibelle().'.'.$file->guessExtension();
            // deplacer l'image 
            
            try {
                $file->move(
                $this->getParameter('images_directory'),
                        $fileName
                        );
            } catch (Exception $ex) {
                
            }
            
            
            $entityManager = $this->getDoctrine()->getManager();
            $produit->setImage($fileName);
            $entityManager->persist($produit);
            $entityManager->flush();
     */

}
