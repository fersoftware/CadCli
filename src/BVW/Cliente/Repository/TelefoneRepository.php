<?php

namespace BVW\Cliente\Repository;

use BVW\Cliente\ClienteInterface;
use BVW\Cliente\Factory\TelefoneFactory;
use BVW\Database\Query;

class TelefoneRepository
{
    /**
     *
     * @var TelefoneFactory
     */
    private $factory;
    
    /**
     *
     * @var Query
     */
    private $query;
    
    public function __construct(TelefoneFactory $factory, Query $query)
    {
        $this->factory = $factory;
        $this->query = $query;
    }
    
    
    public function findAllByClienteId(ClienteInterface $cliente)
    {
        $sql = "SELECT * FROM Telefones WHERE Clientes_id = :id";
        $result = $this->query->returnQuery($sql, array("id" => $cliente->getId()), true);
        
        if (false !== $result) {
            foreach ($result as $tel) {
                $telefone = $this->factory->create($tel["ddd"], $tel["prefixo"], $tel["sufixo"], $tel["ramal"]);            
                $telefone->setId($tel["id"])->setCliente_id($tel["Clientes_id"]);
                $telefones[] = $telefone;
            }
            
            return $telefones;
        }
        
        return false;
    }
}
