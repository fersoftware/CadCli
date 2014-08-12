<?php
namespace BVW\Cliente\Factory;

use BVW\Database\Query;
use BVW\Cliente\PessoaFisica;
use BVW\Cliente\PessoaJuridica;

class ClienteFactory
{
    /**
     * Query handler
     * 
     * @var Query
     */
    private $query;
    
    public function __construct(Query $query)
    {
        $this->query = $query;
    }
    
    /**
     * Creates a PessoaFisica object
     * 
     * @param string $nome
     * @param string $sobrenome
     * @param string $cpf
     * @param int $stars
     * @return PessoaFisica
     */
    public function createPF($nome, $sobrenome, $cpf, $stars = 1)
    {
        $pf = new PessoaFisica();
        $pf->setNome($nome)
            ->setSobrenome($sobrenome)
            ->setCpf($cpf)
            ->setStars($stars)
        ;
        
        return $pf;
    }
    
    /**
     * Creates a PessoaJuridica object
     * 
     * @param string $nomeFantasia
     * @param string $razaoSocial
     * @param string $cnpj
     * @param string $contato
     * @param int $stars
     * @return PessoaJuridica
     */
    public function createPJ($nomeFantasia, $razaoSocial, $cnpj, $contato, $stars = 1)
    {
        $pj = new PessoaJuridica();
        $pj->setNomeFantasia($nomeFantasia)
            ->setRazaoSocial($razaoSocial)
            ->setCnpj($cnpj)
            ->setContato($contato)
            ->setStars($stars)
        ;
        
        return $pj;
    }
    
    public function findAll()
    {
        $sql = "SELECT * FROM Clientes";
        $result = $this->query->returnQuery($sql, array(), true);
        if (!$result) {
            return false;
        }
        
        foreach ($result as $cliente) {
            if (null != $cliente["cpf"]) {
                // Pessoa Fisica
                $pf = new PessoaFisica();
                $pf->setId($cliente["id"])
                    ->setNome($cliente["nome"])
                    ->setSobrenome($cliente["sobrenome"])
                    ->setCpf($cliente["cpf"])
                    ->setStars($cliente["stars"])
                ;
                $clientes[] = $pf;
            } else {
                // Pessoa Juridica
                $pj = new PessoaJuridica();
                $pj->setId($cliente["id"])
                    ->setNomeFantasia($cliente["nomeFantasia"])
                    ->setRazaoSocial($cliente["razaoSocial"])
                    ->setCnpj($cliente["cnpj"])
                    ->setStars($cliente["stars"])
                ;
                $clientes[] = $pj;
            }
        }
        
        return $clientes;
    }
    
    /**
     * Finds PessoaFisica or PessoaJuridica by ID or false in case of error
     * 
     * @param int $id
     * @return PessoaJuridica|PessoaFisica|null
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM Clientes WHERE id = :id";
        $cliente = $this->query->returnQuery($sql, array("id" => $id));
        
        if (null != $cliente["cpf"]) {
            $pf = new PessoaFisica();
            $pf->setId($cliente["id"])
                ->setNome($cliente["nome"])
                ->setSobrenome($cliente["sobrenome"])
                ->setCpf($cliente["cpf"])
                ->setStars($cliente["stars"])
            ;
            
            return $pf;
        } else {
            $pj = new PessoaJuridica();
            $pj->setId($cliente["id"])
                ->setNomeFantasia($cliente["nomeFantasia"])
                ->setRazaoSocial($cliente["razaoSocial"])
                ->setCnpj($cliente["cnpj"])
                ->setContato($cliente["contato"])
                ->setStars($cliente["stars"])
            ;
            
            return $pj;
        }
        
        return false;
    }
}
