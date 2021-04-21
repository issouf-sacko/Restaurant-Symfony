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
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomUser", type="string", length=50, nullable=true)
     */
    private $nomuser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomuser(): ?string
    {
        return $this->nomuser;
    }

    public function setNomuser(?string $nomuser): self
    {
        $this->nomuser = $nomuser;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }


}
