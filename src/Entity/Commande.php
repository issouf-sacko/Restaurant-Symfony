<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="I_FK_commande_client", columns={"id_Client"})})
 * @ORM\Entity
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

}
