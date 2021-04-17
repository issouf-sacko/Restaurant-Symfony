<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
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

}
