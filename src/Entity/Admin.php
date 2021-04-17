<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 */
class Admin
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="nomUser", type="string", length=50, nullable=true)
     */
    private $nomuser;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Pers", referencedColumnName="id_Pers")
     * })
     */
    private $idPers;


}
