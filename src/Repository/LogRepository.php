<?php
namespace App\Repository;

use App\Entity\Log;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Log::class);
    }

    public function consulta(int $codigoCliente, string $identificador, string $codigoEntidad): array
    {

        $queryBuiler = $this->createQueryBuilder('l')
            ->select('l.id')
            ->addSelect('l.fechaRegistro')
            ->addSelect('l.accion')
            ->addSelect('l.usuario')
            ->addSelect('l.ruta')
            ->addSelect('l.datos')
            ->where('l.cliente = :codigoCliente')
            ->andWhere('l.identificador = :identificador')
            ->andWhere('l.codigoEntidad = :codigoEntidad')
            ->setParameter('codigoCliente', $codigoCliente)
            ->setParameter('identificador', $identificador)
            ->setParameter('codigoEntidad', $codigoEntidad)
            ->orderBy('l.fechaRegistro', 'ASC');
        return $queryBuiler->getQuery()->getResult();
    }
}