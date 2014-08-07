<?php
namespace BVW\Cliente;

use BVW\Cliente\ClienteInterface;
use BVW\Cliente\Endereco;
use BVW\Cliente\Telefone;

class PessoaFisica implements ClienteInterface
{
    private $id;
    private $nome;
    private $sobrenome;
    private $cpf;    
    private $stars = 1;
    private $enderecos = array();
    private $telefones = array();
    
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getTelefones()
    {
        return $this->telefones;
    }
    
    public function getEnderecos()
    {
        return $this->enderecos;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        
        return $this;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
        
        return $this;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        
        return $this;
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
        return false;
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