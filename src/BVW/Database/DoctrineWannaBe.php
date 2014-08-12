<?php

namespace BVW\Database;

use BVW\Database\Connection;
use BVW\Cliente\ClienteInterface;

class DoctrineWannaBe
{
    /**
     * PDO object
     * 
     * @var \PDO
     */
    private $pdo;
    
    public function __construct(Connection $connection)
    {
        $this->pdo = $connection->getConnection();
    }
    
    public function persist(ClienteInterface $cliente)
    {
        try {
            $this->pdo->beginTransaction();
            if ($cliente->isPJ()) {
                $cSQL = "INSERT INTO Clientes(nomeFantasia, razaoSocial, cnpj, contato, stars) VALUES(:nomeFantasia, :razaoSocial, :cnpj, :contato, :stars)";
                $stmt = $this->pdo->prepare($cSQL);
                $stmt->execute(array(
                    "nomeFantasia" => $cliente->getNomeFantasia(),
                    "razaoSocial"  => $cliente->getRazaoSocial(),
                    "cnpj"         => $cliente->getCnpj(),
                    "contato"      => $cliente->getContato(),
                    "stars"        => $cliente->getStars()
                ));
                $cliente->setId($this->pdo->lastInsertId());
            } else {
                $cSQL = "INSERT INTO Clientes(nome, sobrenome, cpf, stars) VALUES(:nome, :sobrenome, :cpf, :stars)";
                $cstmt = $this->pdo->prepare($cSQL);
                $cstmt->execute(array(
                    "nome"      => $cliente->getNome(), 
                    "sobrenome" => $cliente->getSobrenome(), 
                    "cpf"       => $cliente->getCpf(),
                    "stars"     => $cliente->getStars()
                ));
                $cliente->setId($this->pdo->lastInsertId());
            }
            $enderecos = $cliente->getEnderecos();
            if (count($enderecos) > 0) {
                foreach ($enderecos as $endereco) {
                    $eSQL  = "INSERT INTO Enderecos(logradouro, numero, complemento, bairro, cidade, uf, cep, isBillingAddress, Clientes_id)";
                    $eSQL .= "VALUES(:logradouro, :numero, :complemento, :bairro, :cidade, :uf, :cep, :isBillingAddress, :Clientes_id)";
                    $estmt = $this->pdo->prepare($eSQL);
                    $estmt->execute(array(
                        "logradouro"       => $endereco->getLogradouro(),
                        "numero"           => $endereco->getNumero(),
                        "complemento"      => $endereco->getComplemento(),
                        "bairro"           => $endereco->getBairro(),
                        "cidade"           => $endereco->getCidade(),
                        "uf"               => $endereco->getUf(),
                        "cep"              => $endereco->getCep(),
                        "isBillingAddress" => $endereco->isBillingAddress(),
                        "Clientes_id"      => $cliente->getId()
                    ));
                }
            }
            $telefones = $cliente->getTelefones();
            if (count($telefones) > 0) {
                foreach ($telefones as $telefone) {
                    $tSQL = "INSERT INTO Telefones(ddd, prefixo, sufixo, ramal, Clientes_id) VALUES(:ddd, :prefixo, :sufixo, :ramal, :Clientes_id)";
                    $tstmt = $this->pdo->prepare($tSQL);
                    $tstmt->execute(array(
                        "ddd"        => $telefone->getDdd(),
                        "prefixo"    => $telefone->getPrefixo(),
                        "sufixo"     => $telefone->getSufixo(),
                        "ramal"      => $telefone->getRamal(),
                        "Clientes_id" => $cliente->getId()
                    ));
                }
            }
        } catch (\PDOException $e) {
            $error = "Erro: " . $e->getMessage();
            $this->pdo->rollBack();
            die($error);
        }
    }
    
    public function flush()
    {
        try {
            $this->pdo->commit();
        } catch (\PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
        
        return true;
    }
}
