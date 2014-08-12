<?php

namespace BVW\Cliente\Factory;

use BVW\Database\Query;
use BVW\Cliente\Telefone;
use BVW\Cliente\ClienteInterface;

class TelefoneFactory
{
    /**
     * Query
     * 
     * @var Query
     */
    private $query;
    
    public function __construct(Query $query)
    {
        $this->query = $query;
    }
    
    /**
     * Creates a Telefone object, adds it to cliente and returns the cliente object
     * 
     * @param string|int $ddd
     * @param string|int $prefixo
     * @param string|int $sufixo
     * @param string|int $ramal
     * @param ClienteInterface $cliente
     * @return Telefone
     */
    public function create($ddd, $prefixo, $sufixo, $ramal)
    {
        $tel = new Telefone();
        $tel->setDdd($ddd)
            ->setPrefixo($prefixo)
            ->setSufixo($sufixo)
            ->setRamal($ramal)
        ;
        
        return $tel;
    }
    
    public function findAllByClienteId(ClienteInterface $cliente)
    {
        $sql = "SELECT * FROM Telefones WHERE Clientes_id = :id";
        $result = $this->query->returnQuery($sql, array("id" => $cliente->getId()), true);
        foreach ($result as $tel) {
            $telefone = new Telefone();            
            $telefones[] = $telefone->setId($tel["id"])
                                    ->setDdd($tel["ddd"])
                                    ->setPrefixo($tel["prefixo"])
                                    ->setSufixo($tel["sufixo"])
                                    ->setRamal($tel["ramal"])
                                    ->setCliente_id($tel["Clientes_id"])
            ;
        }
        
        return $telefones;
    }
}
