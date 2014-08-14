<?php
namespace BVW\Cliente;

use BVW\Cliente\Interfaces\TelefoneInterface;

class Telefone implements TelefoneInterface
{
    private $id;
    private $ddd;
    private $prefixo;
    private $sufixo;
    private $ramal;
    private $cliente_id;
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
        
        return $this;
    }
    
    public function getDdd()
    {
        return $this->ddd;
    }
    
    public function setPrefixo($prefixo)
    {
        $this->prefixo = $prefixo;
        
        return $this;
    }
    
    public function getPrefixo()
    {
        return $this->prefixo;
    }
    
    public function setSufixo($sufixo)
    {
        $this->sufixo = $sufixo;
        
        return $this;
    }
    
    public function getSufixo()
    {
        return $this->sufixo;
    }
    
    public function setRamal($ramal)
    {
        $this->ramal = $ramal;
        
        return $this;
    }
    
    public function getRamal()
    {
        return $this->ramal;
    }    
    
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;
        
        return $this;
    }
    
    public function getCliente_id()
    {
        return $this->cliente_id;
    }
}
