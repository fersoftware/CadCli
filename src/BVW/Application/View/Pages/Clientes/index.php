<?php

use BVW\Application\Router;

$fullRoute = Router::getFullRoute();
$routeParts = explode("/", $fullRoute);

include (__DIR__ . "/clientesArr.php");

if (isset($routeParts[1])) {
    if (!isset($clientesArr[$routeParts[1]])) {
        // Cliente não encontrado
        include(__DIR__."/404.php");
    } elseif ($routeParts[1] == "novo") {
        // TODO: novo cliente
    } else {
        // Detalhar Cliente
        $cliente = $clientesArr[$routeParts[1]];
        include(__DIR__."/detalhes.php");
    }
} else {
    // Mostrar lista de Clientes
    include(__DIR__ . "/lista.php");
}