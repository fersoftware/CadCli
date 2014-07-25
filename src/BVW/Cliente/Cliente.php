<?php
namespace BVW\Cliente;

class Cliente 
{
    private $id;
    private $nome;
    private $sobrenome;
    private $cpf;
    
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    
    private $telefone;
    
    public function __construct(
            $id,
            $nome,
            $sobrenome,
            $cpf,
            $logradouro,
            $numero,
            $complemento,
            $bairro,
            $cidade,
            $uf,
            $cep,
            $telefone
    )
    {
        $this->setId($id)
            ->setNome($nome)
            ->setSobrenome($sobrenome)
            ->setCpf($cpf)
            ->setLogradouro($logradouro)
            ->setNumero($numero)
            ->setComplemento($complemento)
            ->setBairro($bairro)
            ->setCidade($cidade)
            ->setUf($uf)
            ->setCep($cep)
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

    public function getTelefone()
    {
        return $this->telefone;
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

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }


}
