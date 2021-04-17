<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="I_FK_commande_client", columns={"id_Client"})})
 *@ORM\Entity(repositoryClass="App\Repository\CommandeRepository")

 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCmd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCmd", type="date", nullable=false)
     */
    private $datecmd;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Client", referencedColumnName="id_Pers")
     * })
     */
    private $idClient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", mappedBy="idcmd")
     */
    private $idprod;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprod = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdcmd(): ?int
    {
        return $this->idcmd;
    }

    public function getDatecmd(): ?\DateTimeInterface
    {
        return $this->datecmd;
    }

    public function setDatecmd(\DateTimeInterface $datecmd): self
    {
        $this->datecmd = $datecmd;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getIdprod(): Collection
    {
        return $this->idprod;
    }

    public function addIdprod(Produit $idprod): self
    {
        if (!$this->idprod->contains($idprod)) {
            $this->idprod[] = $idprod;
            $idprod->addIdcmd($this);
        }

        return $this;
    }

    public function removeIdprod(Produit $idprod): self
    {
        if ($this->idprod->removeElement($idprod)) {
            $idprod->removeIdcmd($this);
        }

        return $this;
    }

}
