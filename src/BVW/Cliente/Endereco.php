<?php
namespace BVW\Cliente;

class Endereco
{
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    private $isBillingAddress = false;
    
    public function __construct($logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $isBillingAddress = false)
    {
        $this->setLogradouro($logradouro)
                ->setNumero($numero)
                ->setComplemento($complemento)
                ->setBairro($bairro)
                ->setCidade($cidade)
                ->setUf($uf)
                ->setCep($cep)
                ->setIsBillingAddress($isBillingAddress);
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
    
    public function isBillingAddress()
    {
        return $this->isBillingAddress;
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
}