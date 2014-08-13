<?php
namespace BVW\Cliente\Factory;

use BVW\Cliente\PessoaFisica;
use BVW\Cliente\PessoaJuridica;

class ClienteFactory
{
    /**
     * Creates a PessoaFisica object
     * 
     * @param string $nome
     * @param string $sobrenome
     * @param string $cpf
     * @param int $stars
     * @return PessoaFisica
     */
    public function createPF($nome, $sobrenome, $cpf, $stars = 1)
    {
        $pf = new PessoaFisica();
        $pf->setNome($nome)
            ->setSobrenome($sobrenome)
            ->setCpf($cpf)
            ->setStars($stars)
        ;
        
        return $pf;
    }
    
    /**
     * Creates a PessoaJuridica object
     * 
     * @param string $nomeFantasia
     * @param string $razaoSocial
     * @param string $cnpj
     * @param string $contato
     * @param int $stars
     * @return PessoaJuridica
     */
    public function createPJ($nomeFantasia, $razaoSocial, $cnpj, $contato, $stars = 1)
    {
        $pj = new PessoaJuridica();
        $pj->setNomeFantasia($nomeFantasia)
            ->setRazaoSocial($razaoSocial)
            ->setCnpj($cnpj)
            ->setContato($contato)
            ->setStars($stars)
        ;
        
        return $pj;
    }
}
