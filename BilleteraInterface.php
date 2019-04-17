<?php

interface BilleteraInterface
{
    public function sacar($denominacion, $cantidad);
    public function agregar($denominacion, $cantidad);
    public function mostrar();
}
