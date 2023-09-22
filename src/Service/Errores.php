<?php
namespace App\Service;

use App\Clases\Rubidio;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Errores
{
    public function onKernelException(ExceptionEvent $event)
    {
        $entorno = $_ENV['APP_ENV'];
        if($entorno == 'prod') {
            $excepcion = $event->getThrowable();
            $rubidio = new Rubidio();
            $rubidio->error($excepcion->getMessage());
        }
    }
}
