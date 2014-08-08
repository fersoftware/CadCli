<?php
namespace BVW\Cliente;

class Endereco
{
    private $id;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    private $isBillingAddress = false;
    private $cliente_id;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getUf()
    {
        return $this->uf;
    }
    
    public function getCep()
    {
        return $this->cep;
    }
    
    public function getCliente_id()
    {
        return $this->cliente_id;
    }
    
    public function isBillingAddress()
    {
        return $this->isBillingAddress;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
        
        return $this;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        
        return $this;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        
        return $this;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        
        return $this;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        
        return $this;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
        
        return $this;
    }
    
    public function setCep($cep)
    {
        $this->cep = $cep;
        
        return $this;
    }
    
    public function setIsBillingAddress($bool)
    {
        $this->isBillingAddress = (bool) $bool;
        
        return $this;
    }
    
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;
        
        return $this;
    }
}