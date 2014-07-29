<?php
namespace BVW\Cliente;

use BVW\Cliente\Endereco;

interface ClienteInterface
{
    public function isPJ();
    public function setStars($stars);
    public function getStars();
    public function addEndereco(Endereco $endereco);
}