<?php

namespace BVW\Cliente\Factory;

use BVW\Cliente\Telefone;
use BVW\Cliente\ClienteInterface;

class TelefoneFactory
{
    /**
     * Creates a Telefone object, adds it to cliente and returns the cliente object
     * 
     * @param string|int $ddd
     * @param string|int $prefixo
     * @param string|int $sufixo
     * @param string|int $ramal
     * @param ClienteInterface $cliente
     * @return ClienteInterface
     */
    public static function create($ddd, $prefixo, $sufixo, $ramal, ClienteInterface $cliente)
    {
        $tel = new Telefone();
        $tel->setDdd($ddd)
            ->setPrefixo($prefixo)
            ->setSufixo($sufixo)
            ->setRamal($ramal)
        ;
        // TODO: save in database
        // TODO: attribute id to $end
        // TODO: relate telefone to cliente
        $cliente->addTelefone($tel);
        
        return $cliente;
    }
}
