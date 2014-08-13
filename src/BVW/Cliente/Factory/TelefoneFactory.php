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
    
}
