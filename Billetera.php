<?php

require 'BilleteraInterface.php';

class Billetera implements BilleteraInterface
{
    private $billetes;

    public function __construct()
    {
        $this->billetes = array();
    }
    public function mostrar()
    {
        $sumaDinero = 0;
        foreach($this->billetes as $k => $v){
            $sumaDinero += $k * $v;
        }
        //echo $sumaDinero;
        return $sumaDinero;
    }
   
    public function sacar($denominacion, $cantidad)
    {
        if(!isset($this->billetes[$denominacion])){
            return false;
        }
        if ($this->billetes[$denominacion] != 0){
            if($this->billetes[$denominacion] >= $cantidad){
                $this->billetes[$denominacion] -= $cantidad; 
                return true;
            }
            return false;
        }
        return false;
        
    }
    public function agregar($denominacion, $cantidad)
    {
        if (isset($this->billetes[$denominacion])){
            $this->billetes[$denominacion] += $cantidad;
            return true;
        }else{
            $this->billetes[$denominacion] = $cantidad;
            return true;
        }
    }
}

/* $bille = new Billetera();
$bille->agregar(10, 5);

$bille->agregar(100, 1);
$bille->mostrar(); */