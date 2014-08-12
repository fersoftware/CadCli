<?php

use BVW\Application\Application;
use BVW\Application\Router;
use BVW\Database\Connection;
use BVW\Database\Query;
use BVW\Cliente\Factory\ClienteFactory;
use BVW\Cliente\Factory\EnderecoFactory;
use BVW\Cliente\Factory\TelefoneFactory;

$connection = new Connection(Application::getConfig("database"));
$query = new Query($connection);
$cFactory = new ClienteFactory($query);
$eFactory = new EnderecoFactory($query);
$tFactory = new TelefoneFactory($query);

$fullRoute = Router::getFullRoute();
$routeParts = explode("/", $fullRoute);

if (isset($routeParts[1])) {
    if ($routeParts[1] == "novo") {
        // TODO: novo cliente
    } else {
        $cliente = $cFactory->findById($routeParts[1]);
        if (null == $cliente) {
            // Cliente não encontrado
            include(__DIR__."/404.php");
        } else {
            // Detalhar Cliente   
            $telefones = $tFactory->findAllByClienteId($cliente);
            foreach ($telefones as $telefone) {
                $cliente->addTelefone($telefone);
            }
            $enderecos = $eFactory->findAllByClienteId($cliente);
            foreach ($enderecos as $endereco) {
                $cliente->addEndereco($endereco);
            }
            include(__DIR__."/detalhes.php");
        }
    }
} else {
    // Mostrar lista de Clientes
    $clientesArr = $cFactory->findAll();
    include(__DIR__ . "/lista.php");
}