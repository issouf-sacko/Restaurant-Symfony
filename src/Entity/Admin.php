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
     * @ORM\Column(name="id_Pers", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomUser", type="string", length=50, nullable=true)
     */
    private $nomuser;

    public function getIdPers(): ?int
    {
        return $this->idPers;
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


}
