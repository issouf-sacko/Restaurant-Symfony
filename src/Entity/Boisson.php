<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boisson
 *
 * @ORM\Table(name="boisson", indexes={@ORM\Index(name="I_FK_boisson_type", columns={"idType"})})
 * @ORM\Entity
 */
class Boisson
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="quantite", type="string", length=15, nullable=true)
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="PRIX", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \Produit
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProd", referencedColumnName="idProd")
     * })
     */
    private $idprod;

    /**
     * @var \Type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idType", referencedColumnName="idType")
     * })
     */
    private $idtype;


}
