<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="nomUtilisateur", columns={"nomUtilisateur"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomUtilisateur", type="string", length=50, nullable=true)
     */
    private $nomutilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motDePasse", type="string", length=50, nullable=true)
     */
    private $motdepasse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=true)
     */
    private $role;


}
