<?php
namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(targetEntity: Log::class, mappedBy: 'log')]
    private Collection $clientes;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string|null $nombre
     */
    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return Collection
     */
    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    /**
     * @param Collection $clientes
     */
    public function setClientes(Collection $clientes): void
    {
        $this->clientes = $clientes;
    }


}