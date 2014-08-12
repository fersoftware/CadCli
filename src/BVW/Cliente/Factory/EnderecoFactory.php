<?php

namespace BVW\Cliente\Factory;

use BVW\Database\Query;
use BVW\Cliente\Endereco;
use BVW\Cliente\ClienteInterface;

class EnderecoFactory
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
     * Creates an Endereco object, adds it to cliente and returns the cliente object
     * 
     * @param string $logradouro
     * @param string $numero
     * @param string $complemento
     * @param string $bairro
     * @param string $cidade
     * @param string $uf
     * @param string $cep
     * @param boolean $isBillingAddress
     * @param ClienteInterface $cliente
     * @return Endereco
     */
    public function create($logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $isBillingAddress)
    {
        $end = new Endereco();
        $end->setLogradouro($logradouro)
            ->setNumero($numero)
            ->setComplemento($complemento)
            ->setBairro($bairro)
            ->setCidade($cidade)
            ->setUf($uf)
            ->setCep($cep)
            ->setIsBillingAddress($isBillingAddress)
        ;
        
        return $end;
    }
    
    public function findAllByClienteId(ClienteInterface $cliente)
    {
        $sql = "SELECT * FROM Enderecos WHERE Clientes_id = :id";
        $result = $this->query->returnQuery($sql, array("id" => $cliente->getId()), true);
        foreach ($result as $end) {
            $endereco = new Endereco();
            $enderecos[] = $endereco->setId($end["id"])
                                    ->setLogradouro($end["logradouro"])
                                    ->setNumero($end["numero"])
                                    ->setComplemento($end["complemento"])
                                    ->setBairro($end["bairro"])
                                    ->setCidade($end["cidade"])
                                    ->setUf($end["uf"])
                                    ->setCep($end["cep"])
                                    ->setIsBillingAddress($end["isBillingAddress"])
                                    ->setCliente_id($end["Clientes_id"])
            ;
        }
        
        return $enderecos;
    }
}
