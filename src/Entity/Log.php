<?php
namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'date')]
    private $fecha;

    #[ORM\Column(type: 'datetime')]
    private $fechaRegistro;

    #[ORM\Column(length: 20)]
    private ?string $identificador = null;

    #[ORM\Column(length: 200)]
    private ?string $codigoEntidad = null;

    #[ORM\Column(length: 20)]
    private ?string $accion = null;

    #[ORM\Column(length: 25)]
    private ?string $usuario = null;

    #[ORM\Column(length: 200)]
    private ?string $ruta = null;

    #[ORM\Column(length: 5000)]
    private ?string $datos = null;

    #[ORM\Column(length: 10, nullable:true)]
    private ?string $entorno = null;

    #[ORM\ManyToOne(targetEntity: Cliente::class, inversedBy: 'clientes')]
    private Cliente $cliente;

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
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * @param mixed $fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro): void
    {
        $this->fechaRegistro = $fechaRegistro;
    }

    /**
     * @return string|null
     */
    public function getIdentificador(): ?string
    {
        return $this->identificador;
    }

    /**
     * @param string|null $identificador
     */
    public function setIdentificador(?string $identificador): void
    {
        $this->identificador = $identificador;
    }

    /**
     * @return string|null
     */
    public function getCodigoEntidad(): ?string
    {
        return $this->codigoEntidad;
    }

    /**
     * @param string|null $codigoEntidad
     */
    public function setCodigoEntidad(?string $codigoEntidad): void
    {
        $this->codigoEntidad = $codigoEntidad;
    }

    /**
     * @return string|null
     */
    public function getAccion(): ?string
    {
        return $this->accion;
    }

    /**
     * @param string|null $accion
     */
    public function setAccion(?string $accion): void
    {
        $this->accion = $accion;
    }

    /**
     * @return string|null
     */
    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    /**
     * @param string|null $usuario
     */
    public function setUsuario(?string $usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return string|null
     */
    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    /**
     * @param string|null $ruta
     */
    public function setRuta(?string $ruta): void
    {
        $this->ruta = $ruta;
    }

    /**
     * @return string|null
     */
    public function getDatos(): ?string
    {
        return $this->datos;
    }

    /**
     * @param string|null $datos
     */
    public function setDatos(?string $datos): void
    {
        $this->datos = $datos;
    }

    /**
     * @return Cliente
     */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     */
    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return string|null
     */
    public function getEntorno(): ?string
    {
        return $this->entorno;
    }

    /**
     * @param string|null $entorno
     */
    public function setEntorno(?string $entorno): void
    {
        $this->entorno = $entorno;
    }

}