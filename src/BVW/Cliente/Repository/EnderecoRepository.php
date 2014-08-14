<?php

namespace BVW\Cliente\Repository;

use BVW\Cliente\Interfaces\ClienteInterface;
use BVW\Cliente\Factory\EnderecoFactory;
use BVW\Database\Query;

class EnderecoRepository
{
    /**
     *
     * @var EnderecoFactory
     */
    private $factory;
    
    /**
     *
     * @var Query
     */
    private $query;
    
    public function __construct(EnderecoFactory $factory, Query $query)
    {
        $this->factory = $factory;
        $this->query = $query;
    }
    
    public function findAllByClienteId(ClienteInterface $cliente)
    {
        $sql = "SELECT * FROM Enderecos WHERE Clientes_id = :id";
        $result = $this->query->returnQuery($sql, array("id" => $cliente->getId()), true);
        if (false !== $result) {
            foreach ($result as $end) {
                $endereco = $this->factory->create(
                    $end["logradouro"], 
                    $end["numero"], 
                    $end["complemento"], 
                    $end["bairro"], 
                    $end["cidade"], 
                    $end["uf"], 
                    $end["cep"], 
                    $end["isBillingAddress"]
                );
                $endereco->setId($end["id"])->setCliente_id($end["Clientes_id"]);
                $enderecos[] = $endereco;
            }
            
            return $enderecos;
        }
        
        return false;
    }
}
