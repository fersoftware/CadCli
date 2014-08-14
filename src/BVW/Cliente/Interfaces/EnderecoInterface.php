<?php

namespace BVW\Cliente\Interfaces;


interface EnderecoInterface
{
    public function isBillingAddress();
    public function setIsBillingAddress($bool);
    public function setCliente_id($id);
    public function getCliente_id();
}
