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


// Criar tabelas

$sql = "CREATE SCHEMA IF NOT EXISTS `cadcli` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `cadcli` ;";
$query->noReturnQuery($sql, array());
$sql = "DROP TABLE IF EXISTS `cadcli`.`Telefones` ; DROP TABLE IF EXISTS `cadcli`.`Enderecos` ; DROP TABLE IF EXISTS `cadcli`.`Clientes` ;

CREATE TABLE IF NOT EXISTS `cadcli`.`Clientes` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `sobrenome` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `cpf` VARCHAR(14) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `nomeFantasia` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `razaoSocial` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `cnpj` VARCHAR(18) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `contato` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `stars` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 170
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `cadcli`.`Telefones` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `ddd` INT(11) NOT NULL,
  `prefixo` INT(11) NOT NULL,
  `sufixo` INT(11) NOT NULL,
  `ramal` INT(11) NULL DEFAULT NULL,
  `Clientes_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `Clientes_id`),
  INDEX `fk_Telefones_Clientes_idx` (`Clientes_id` ASC),
  CONSTRAINT `fk_Telefones_Clientes`
    FOREIGN KEY (`Clientes_id`)
    REFERENCES `cadcli`.`Clientes` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `cadcli`.`Enderecos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `logradouro` VARCHAR(255) NOT NULL,
  `numero` VARCHAR(45) NULL,
  `complemento` VARCHAR(45) NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `isBillingAddress` TINYINT(1) NOT NULL,
  `Clientes_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `Clientes_id`),
  INDEX `fk_Enderecos_Clientes1_idx` (`Clientes_id` ASC),
  CONSTRAINT `fk_Enderecos_Clientes1`
    FOREIGN KEY (`Clientes_id`)
    REFERENCES `cadcli`.`Clientes` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;";
$query->noReturnQuery($sql, array());

// Entrada de Dados
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