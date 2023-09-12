<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class LogController
{
    #[Route('/log/nuevo')]
    public function nuevo(Request $request): JsonResponse
    {
        $raw = json_decode($request->getContent(), true);
        $codigoCliente = $raw['codigoCliente'] ?? null;
        $logs = $raw['logs'] ?? null;
        if($codigoCliente && $logs) {
            return new JsonResponse([
                'error' => false
            ]);
        } else {
            return new JsonResponse([
                'error' => true,
                'errorMensaje' => "Faltan parametros para el consumo de la api"
            ]);
        }
    }

    #[Route('/log/consulta')]
    public function consulta(): JsonResponse
    {
        return new JsonResponse([
            'error' => false
        ]);
    }
}