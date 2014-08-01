<?php

use BVW\Cliente\PessoaFisica;
use BVW\Cliente\PessoaJuridica;
use BVW\Cliente\Endereco;
use BVW\Cliente\Telefone;

$cliente = new PessoaFisica(1, "José", "da Silva", "256.749.886-92");
$cliente->addTelefone(new Telefone(1, "31", "2222", "1111"))
        ->addEndereco(new Endereco("Rua dos Otoni", 88, null, "Santa Efigênia", "Belo Horizonte", "MG", "30150-270"))
        ->addEndereco(new Endereco("Rua Padre Rolim", 500, "Apto. 202", "São Lucas", "Belo Horizonte", "MG", "30130-090", true))
        ->setStars(3);
$clientesArr[] = $cliente;

$cliente = new PessoaFisica(3, "João", "da Silva", "432.127.612-88", "(31) 3222-2222");
$cliente->addTelefone(new Telefone(2, "31", "3222", "2222"))
        ->addTelefone(new Telefone(5, "31", "3222", "3333"))
        ->addEndereco(new Endereco("Av. Barbacena", 679, null, "Centro", "Belo Horizonte", "MG", "30190-130"));

$clientesArr[] = $cliente;

$cliente = new PessoaJuridica(2, "Centro de Diagnóstico São Camilo LTDA", "Corpus - Centro de Diagnósticos", "16.194.492/0001-33", "Helbert Augsten");
$cliente->addTelefone(new Telefone(3, "35", "3427", "6100"))
        ->addEndereco(new Endereco("Av. Alfredo Custódio de Paula", "333", null, "Medicina", "Pouso Alegre", "MG", "37550-000", true))
        ->setStars(4);

$clientesArr[] = $cliente;

$cliente = new PessoaJuridica(4, "BVW Sistemas LTDA", "brunowerneck.com.br", "78.868.733/0001-30", "Bruno Werneck");
$cliente->addTelefone(new Telefone(4, "31", "2511", "0000"))
        ->addEndereco(new Endereco("Av. Carandaí", "353", null, "Funcionários", "Belo Horizonte", "MG", "30130-060"))
        ->addEndereco(new Endereco("Av. Augusto de Lima", 1016, "Sala 15", "Barro Preto", "Belo Horizonte", "MG", "30190-003", true))
        ->setStars(5);

$clientesArr[] = $cliente;
