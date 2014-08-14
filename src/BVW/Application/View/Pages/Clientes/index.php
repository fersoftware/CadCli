<?php

use BVW\Application\Application;
use BVW\Application\Router;
use BVW\Database\Connection;
use BVW\Database\Query;
use BVW\Cliente\Factory\ClienteFactory;
use BVW\Cliente\Factory\EnderecoFactory;
use BVW\Cliente\Factory\TelefoneFactory;
use BVW\Cliente\Repository\ClienteRepository;
use BVW\Cliente\Repository\EnderecoRepository;
use BVW\Cliente\Repository\TelefoneRepository;

$connection = new Connection(Application::getConfig("database"));
$query = new Query($connection);
$routeParts = explode("/", Router::getFullRoute());
$cRepo = new ClienteRepository(new ClienteFactory(), $query);

if (isset($routeParts[1])) {    
    if ($routeParts[1] == "novo") {
        // TODO: novo cliente
    } else {
        $cliente = $cRepo->findById($routeParts[1]);
        if (false === $cliente) {
            // Cliente não encontrado
            include(__DIR__."/404.php");
        } else {
            // Detalhar Cliente
            $tRepo = new TelefoneRepository(new TelefoneFactory(), $query);
            $eRepo = new EnderecoRepository(new EnderecoFactory(), $query);
            
            $telefones = $tRepo->findAllByClienteId($cliente);
            foreach ($telefones as $telefone) {
                $cliente->addTelefone($telefone);
            }
            
            $enderecos = $eRepo->findAllByClienteId($cliente);
            foreach ($enderecos as $endereco) {
                $cliente->addEndereco($endereco);
            }
            include(__DIR__."/detalhes.php");
        }
    }
} else {
    // Mostrar lista de Clientes
    $clientesArr = $cRepo->findAll();
    include(__DIR__ . "/lista.php");
}