<?php
namespace BVW\Cliente;

use BVW\Cliente\ClienteInterface;
use BVW\Cliente\Endereco;

class PessoaFisica implements ClienteInterface
{
    private $id;
    private $nome;
    private $sobrenome;
    private $cpf;    
    private $telefone;    
    private $stars = 1;
    private $enderecos = array();
    
    public function __construct($id, $nome, $sobrenome, $cpf, $telefone)
    {
        $this->setId($id)
            ->setNome($nome)
            ->setSobrenome($sobrenome)
            ->setCpf($cpf)
            ->setTelefone($telefone)
        ;
    }
    
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

    public function getTelefone()
    {
        return $this->telefone;
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

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
    
    public function addEndereco(Endereco $endereco)
    {
        $this->enderecos[] = $endereco;
        
        return $this;
    }

    public function isPJ()
    {
        return false;
    }

    public function setStars($stars)
    {
        if ($stars > 5) {
            $stars = 5;
        } elseif ($stars < 1) {
            $stars = 1;
        }
        
        $this->stars = $stars;
        
        return $this;
    }
    
    public function getStars()
    {
        return $this->stars;
    }
}