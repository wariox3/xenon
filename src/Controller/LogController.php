<?php
namespace App\Controller;

use App\Entity\Cliente;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class LogController extends AbstractController
{
    #[Route('/log/nuevo')]
    public function nuevo(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $raw = json_decode($request->getContent(), true);
        $codigoCliente = $raw['codigoCliente'] ?? null;
        $logs = $raw['logs'] ?? null;
        if($codigoCliente && $logs) {
            $cliente = $em->getRepository(Cliente::class)->find($codigoCliente);
            if($cliente) {
                foreach ($logs as $logParametro) {
                    $fecha = date_create($logParametro['fechaRegistro']);
                    $log = new Log();
                    $log->setCliente($cliente);
                    $log->setFecha(new \DateTime('now'));
                    $log->setIdentificador($logParametro['identificador']);
                    $log->setCodigoEntidad($logParametro['codigoEntidad']);
                    $log->setAccion($logParametro['accion']);
                    $log->setUsuario($logParametro['usuario']);
                    $log->setRuta($logParametro['ruta']);
                    $log->setFechaRegistro($fecha);
                    $log->setDatos($logParametro['jsonRegistro']);
                    $log->setEntorno($logParametro['entorno']??null);
                    $em->persist($log);
                }
                $em->flush();
                return new JsonResponse([
                    'error' => false
                ]);
            } else {
                return new JsonResponse([
                    'error' => true,
                    'errorMensaje' => "El cliente no existe"
                ]);
            }
        } else {
            return new JsonResponse([
                'error' => true,
                'errorMensaje' => "Faltan parametros para el consumo de la api"
            ]);
        }
    }

    #[Route('/log/consulta')]
    public function consulta(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $raw = json_decode($request->getContent(), true);
        $codigoCliente = $raw['codigoCliente'] ?? null;
        $identificador = $raw['identificador'] ?? null;
        $codigoEntidad = $raw['codigoEntidad'] ?? null;
        if($codigoCliente && $identificador && $codigoEntidad) {
            $logs = $em->getRepository(Log::class)->consulta($codigoCliente, $identificador, $codigoEntidad);
            return new JsonResponse([
                'error' => false,
                'logs' =>$logs
            ]);
        } else {
            return new JsonResponse([
                'error' => true,
                'errorMensaje' => "Faltan parametros para el consumo de la api"
            ]);
        }

    }
}