<?php

namespace BVW\Cliente\Repository;

use BVW\Cliente\Factory\ClienteFactory;
use BVW\Database\Query;

class ClienteRepository
{
    /**
     *
     * @var ClienteFactory
     */
    private $factory;
    
    /**
     *
     * @var Query
     */
    private $query;
    
    public function __construct(ClienteFactory $factory, Query $query)
    {
        $this->factory = $factory;
        $this->query = $query;
    }
    
    public function findAll()
    {
        $sql = "SELECT * FROM Clientes";
        $result = $this->query->returnQuery($sql, array(), true);
        if (false !== $result) {
            foreach ($result as $cliente) {
                if (null != $cliente["cpf"]) {
                    // Pessoa Fisica                
                    $clientes[] = $this->setPF($cliente);
                } else {
                    // Pessoa Juridica                
                    $clientes[] = $this->setPJ($cliente);
                }
            }

            return $clientes;
        }
        
        return false;
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
                        
            return $this->setPF($cliente);
        } else {
            
            return $this->setPJ($cliente);
        }
        
        return false;
    }
    
    
    private function setPF(array $cliente)
    {
        $pf = $this->factory->createPF(
            $cliente["nome"], 
            $cliente["sobrenome"], 
            $cliente["cpf"], 
            $cliente["stars"]
        );
        $pf->setId($cliente["id"]);
        
        return $pf;
    }
    
    private function setPJ(array $cliente)
    {
        $pj = $this->factory->createPJ(
            $cliente["nomeFantasia"], 
            $cliente["razaoSocial"], 
            $cliente["cnpj"], 
            $cliente["contato"], 
            $cliente["stars"]
        );
        $pj->setId($cliente["id"]);
        
        return $pj;
    }
    
}
