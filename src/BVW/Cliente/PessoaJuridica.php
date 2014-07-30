<?php
namespace BVW\Cliente;

use BVW\Cliente\ClienteInterface;
use BVW\Cliente\Endereco;
use BVW\Cliente\Telefone;

class PessoaJuridica implements ClienteInterface
{
    private $id;
    private $nomeFantasia;
    private $razaoSocial;
    private $cnpj;
    private $contato;
    private $telefones = array();
    private $enderecos = array();
    private $stars = 1;    
    
    public function __construct($id, $nomeFantasia, $razaoSocial, $cnpj, $contato)
    {
        $this->setId($id)
            ->setNomeFantasia($nomeFantasia)
            ->setRazaoSocial($razaoSocial)
            ->setCnpj($cnpj)
            ->setContato($contato)
        ;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }
    
    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function getTelefones()
    {
        return $this->telefones;
    }

    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
        return $this;
    }

    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        
        return $this;
    }
    
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        
        return $this;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
        
        return $this;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        
        return $this;
    }

        
    public function getEnderecos()
    {
        return $this->enderecos;
    }
    
    public function addTelefone(Telefone $telefone)
    {
        $this->telefones[] = $telefone;
        
        return $this;
    }
    
    public function hasTelefone()
    {
        return count($this->telefones) > 0 ? true : false;
    }
    
    public function addEndereco(Endereco $endereco)
    {
        $this->enderecos[] = $endereco;
        
        return $this;
    }
    
    public function hasEndereco()
    {
        return count($this->enderecos) > 0 ? true : false;
    }

    public function isPJ()
    {
        return true;
    }

    public function setStars($stars)
    {
        if ((int) $stars > 5) {
            $stars = 5;
        } elseif ((int) $stars < 1) {
            $stars = 1;
        }
        
        $this->stars = (int) $stars;
        
        return $this;
    }
    
    public function getStars()
    {
        return $this->stars;
    }
}