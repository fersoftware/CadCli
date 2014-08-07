<?php

use BVW\Cliente\Factory\ClienteFactory;
use BVW\Cliente\Factory\EnderecoFactory;
use BVW\Cliente\Factory\TelefoneFactory;


$cliente1 = ClienteFactory::createPF("José", "da Silva", "256.749.886-92");
$cliente1 = TelefoneFactory::create("31", "2222", "1111", null, $cliente1);
$cliente1 = EnderecoFactory::create("Rua dos Otoni", 88, null, "Santa Efigênia", "Belo Horizonte", "MG", "30150-270", false, $cliente1);
$cliente1 = EnderecoFactory::create("Rua Padre Rolim", 500, "Apto. 202", "São Lucas", "Belo Horizonte", "MG", "30130-090", true, $cliente1)
        ->setStars(3);
$clientesArr[] = $cliente1;

$cliente2 = ClienteFactory::createPF("João", "da Silva", "432.127.612-88", "(31) 3222-2222");
$cliente2 = TelefoneFactory::create("31", "3222", "2222", null, $cliente2);
$cliente2 = TelefoneFactory::create("31", "3222", "2222", null, $cliente2);
$cliente2 = EnderecoFactory::create("Av. Barbacena", 679, null, "Centro", "Belo Horizonte", "MG", "30190-130", false, $cliente2);
$clientesArr[] = $cliente2;

$cliente3 = ClienteFactory::createPJ("Centro de Diagnóstico São Camilo LTDA", "Corpus - Centro de Diagnósticos", "16.194.492/0001-33", "Helbert Augsten");
$cliente3 = TelefoneFactory::create("35", "3427", "6100", null, $cliente3);
$cliente3 = EnderecoFactory::create("Av. Alfredo Custódio de Paula", "333", null, "Medicina", "Pouso Alegre", "MG", "37550-000", true, $cliente3)
        ->setStars(4);
$clientesArr[] = $cliente3;

$cliente4 = ClienteFactory::createPJ("BVW Sistemas LTDA", "brunowerneck.com.br", "78.868.733/0001-30", "Bruno Werneck");
$cliente4 = TelefoneFactory::create("31", "2511", "0000", null, $cliente4);
$cliente4 = EnderecoFactory::create("Av. Carandaí", "353", null, "Funcionários", "Belo Horizonte", "MG", "30130-060", false, $cliente4);
$cliente4 = EnderecoFactory::create("Av. Augusto de Lima", 1016, "Sala 15", "Barro Preto", "Belo Horizonte", "MG", "30190-003", true, $cliente4)
        ->setStars(5);
$clientesArr[] = $cliente4;
