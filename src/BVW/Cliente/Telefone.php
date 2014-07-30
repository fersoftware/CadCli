<?php
namespace BVW\Cliente;

class Telefone
{
    private $id;
    private $ddd;
    private $numero1;
    private $numero2;
    private $ramal;
    
    public function __construct($id, $ddd, $numero1, $numero2, $ramal = null)
    {
        $this->setId($id)
            ->setDdd($ddd)
            ->setNumero1($numero1)
            ->setNumero2($numero2)
            ->setRamal($ramal)
        ;
    }
    
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
    
    public function setNumero1($numero1)
    {
        $this->numero1 = $numero1;
        
        return $this;
    }
    
    public function getNumero1()
    {
        return $this->numero1;
    }
    
    public function setNumero2($numero2)
    {
        $this->numero2 = $numero2;
        
        return $this;
    }
    
    public function getNumero2()
    {
        return $this->numero2;
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
}
