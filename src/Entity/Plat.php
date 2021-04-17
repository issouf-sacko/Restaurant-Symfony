<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plat
 *
 * @ORM\Table(name="plat", indexes={@ORM\Index(name="I_FK_PLAT_categorie", columns={"idCat"})})
 * @ORM\Entity
 */
class Plat
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

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


}
