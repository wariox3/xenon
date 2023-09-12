<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InicioController
{
    #[Route('/')]
    public function number(): Response
    {
        return new Response(
            '<html><body>Servicios log</body></html>'
        );
    }
}