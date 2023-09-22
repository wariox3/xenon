<?php

namespace App\Clases;

class Rubidio
{

    private $urlBase = "http://142.93.149.5/rubidio/public/index.php";

    public function __construct()
    {

    }

    public function error(string $mensaje): void
    {
        $url = "{$this->urlBase}/api/error/nuevo";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, 1);
        $campos = [
            "codigoCliente" => 1,
            "mensaje" => $mensaje,
            "codigo" => "",
            "ruta" => "",
            "archivo" => "",
            "traza" => "",
            "linea" => "1",
            "usuario" => "",
            "email" => "",
        ];
        $data = json_encode($campos);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_exec($curl) == 'true';
        curl_close($curl);
    }

}