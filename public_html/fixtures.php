<?php
require_once(__DIR__."/../vendor/autoload.php");

use BVW\Application\Application;
use BVW\Application\Router;
use BVW\Application\View\View;
use BVW\Database\Connection;
use BVW\Database\Query;
use BVW\Database\DoctrineWannaBe;
use BVW\Cliente\Factory\ClienteFactory;
use BVW\Cliente\Factory\EnderecoFactory;
use BVW\Cliente\Factory\TelefoneFactory;

$app = new Application(new Router(), new View());
$connection = new Connection(Application::getConfig("database"));
$query = new Query($connection);
$cFactory = new ClienteFactory($query);
$eFactory = new EnderecoFactory($query);
$tFactory = new TelefoneFactory($query);

$doctrine = new DoctrineWannaBe($connection);

$cliente1 = $cFactory->createPF("José", "da Silva", "256.749.886-92", 3);
$cliente1->addTelefone($tFactory->create("31", "2222", "1111", null))
        ->addEndereco($eFactory->create("Rua dos Otoni", 88, null, "Santa Efigênia", "Belo Horizonte", "MG", "30150-270", false))
        ->addEndereco($eFactory->create("Rua Padre Rolim", 500, "Apto. 202", "São Lucas", "Belo Horizonte", "MG", "30130-090", true))
;
$doctrine->persist($cliente1);
$doctrine->flush();

$cliente2 = $cFactory->createPF("João", "Ninguém", "432.127.612-88");
$cliente2->addTelefone($tFactory->create("31", "3222", "2222", null))
        ->addTelefone($tFactory->create("31", "3222", "3333", null))
        ->addEndereco($eFactory->create("Av. Barbacena", 679, null, "Centro", "Belo Horizonte", "MG", "30190-130", false));
$doctrine->persist($cliente2);
$doctrine->flush();

$cliente3 = $cFactory->createPJ("Centro de Diagnóstico São Camilo LTDA", "Corpus - Centro de Diagnósticos", "16.194.492/0001-33", "Helbert Augsten", 4);
$cliente3->addTelefone($tFactory->create("35", "3427", "6100", null))
        ->addEndereco($eFactory->create("Av. Alfredo Custódio de Paula", "333", null, "Medicina", "Pouso Alegre", "MG", "37550-000", true))
;
$doctrine->persist($cliente3);
$doctrine->flush();

$cliente4 = $cFactory->createPJ("BVW Sistemas LTDA", "brunowerneck.com.br", "78.868.733/0001-30", "Bruno Werneck", 5);
$cliente4->addTelefone($tFactory->create("31", "2511", "0000", null))
        ->addEndereco($eFactory->create("Av. Carandaí", "353", null, "Funcionários", "Belo Horizonte", "MG", "30130-060", false))
        ->addEndereco($eFactory->create("Av. Augusto de Lima", 1016, "Sala 15", "Barro Preto", "Belo Horizonte", "MG", "30190-003", true))
;
$doctrine->persist($cliente4);
$doctrine->flush();

echo "fixtures loaded<br />\n";