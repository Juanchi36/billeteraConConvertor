<?php

require 'ApiDolar.php';

class ConvertorADolar implements BilleteraInterface
{
    private $billetera;

    public function sacar($denominacion, $cantidad)
    {
        return $this->billetera->sacar($denominacion, $cantidad);
    }
    public function agregar($denominacion, $cantidad)
    {
        return $this->billetera->agregar($denominacion, $cantidad);
    }
    public function mostrar()
    {   
        //echo ($this->billetera->mostrar()) / ApiDolar::dameDolar();
        return ($this->billetera->mostrar()) / ApiDolar::dameDolar();
    }
    public function __construct(BilleteraInterface $billetera)
    {
        $this->billetera = $billetera;
    }
}