<?php
namespace BVW\Cliente\Interfaces;

use BVW\Cliente\Endereco;
use BVW\Cliente\Telefone;

interface ClienteInterface
{
    public function isPJ();
    public function setStars($stars);
    public function getStars();
    public function hasTelefone();
    public function addTelefone(Telefone $telefone);
    public function hasEndereco();
    public function addEndereco(Endereco $endereco);
}