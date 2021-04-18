<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="I_FK_RESERVATION_client", columns={"idClient"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idReserv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreserv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReserv", type="date", nullable=false)
     */
    private $datereserv;

    /**
     * @var int
     *
     * @ORM\Column(name="nbCouvert", type="integer", nullable=false)
     */
    private $nbcouvert;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArrive", type="time", nullable=false)
     */
    private $heurearrive;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=70, nullable=false)
     */
    private $email;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id_Pers")
     * })
     */
    private $idclient;


}
