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
     * @return PessoaFisica
     */
    public static function createPF($nome, $sobrenome, $cpf)
    {
        $pf = new PessoaFisica();
        $pf->setNome($nome)
            ->setSobrenome($sobrenome)
            ->setCpf($cpf)
        ;
        // TODO: save in database
        // TODO: attribute id into pf
        
        return $pf;
    }
    
    /**
     * Creates a PessoaJuridica object
     * 
     * @param string $nomeFantasia
     * @param string $razaoSocial
     * @param string $cnpj
     * @param string $contato
     * @return PessoaJuridica
     */
    public static function createPJ($nomeFantasia, $razaoSocial, $cnpj, $contato)
    {
        $pj = new PessoaJuridica();
        $pj->setNomeFantasia($nomeFantasia)
            ->setRazaoSocial($razaoSocial)
            ->setCnpj($cnpj)
            ->setContato($contato)
        ;
        // TODO: save in database
        // TODO: attribute id into pj
        
        return $pj;
    }
}
