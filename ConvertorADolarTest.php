<?php

require_once('./vendor/autoload.php');
require('./Billetera.php');
require('./ConvertorADolar.php');

use PHPUnit\Framework\TestCase;

final class ConvertorADolarTest extends TestCase
{
  /**
   * @return ConvertorADolar
   */
  public function crearConvertor() {
    $billetera = new Billetera();
    $convertor = new ConvertorADolar($billetera);
    return $convertor;
  }

  public function testExistsConvertor() {
    $this->assertTrue(class_exists("ConvertorADolar"));
  }

  public function testAgregar() {
    $convertor = $this->crearConvertor();
    $this->assertTrue($convertor->agregar(10, 10));
    $this->assertTrue($convertor->agregar(50, 10));
    $this->assertTrue($convertor->agregar(100, 10));
  }

  public function testSacar() {
    $convertor = $this->crearConvertor();
    $convertor->agregar(10, 10);
    $convertor->agregar(50, 10);
    $convertor->agregar(100, 10);

    $this->assertTrue($convertor->sacar(10, 10));
    $this->assertTrue($convertor->sacar(50, 10));
    $this->assertTrue($convertor->sacar(100, 10));
  }

  public function testSacarBilleteQueNoExiste() {
    $convertor = $this->crearConvertor();
    $convertor->agregar(10, 10);
    $convertor->agregar(50, 10);
    $convertor->agregar(100, 10);

    $this->assertFalse($convertor->sacar(20, 1));
  }

  public function testMostrarCuandoEstaVacia() {
    $convertor = $this->crearConvertor();
    $this->assertEquals(0, $convertor->mostrar());
  }

  public function testMostrarDespuesDeAgregarBilletes() {
    $convertor = $this->crearConvertor();
    $convertor->agregar(10, 10);
    $convertor->agregar(500, 2);
    $convertor->agregar(1000, 1);
    $this->assertEquals(2100/ApiDolar::dameDolar(), $convertor->mostrar());
  }

  public function testMostrarDespuesDeAgregarYSacar() {
    $convertor = $this->crearConvertor();
    $convertor->agregar(10, 10);
    $convertor->agregar(500, 2);
    $convertor->agregar(1000, 1);
    $convertor->sacar(500, 1);
    $this->assertEquals(1600/ApiDolar::dameDolar(), $convertor->mostrar());
  }

  public function testMostrarDespuesDeAgregarYSacarHastaQuedarVacia() {
    $convertor = $this->crearConvertor();
    $convertor->agregar(10, 10);
    $convertor->agregar(500, 2);
    $convertor->agregar(1000, 1);
    $convertor->sacar(10, 10);
    $convertor->sacar(500, 2);
    $convertor->sacar(1000, 1);
    $this->assertEquals(0/ApiDolar::dameDolar(), $convertor->mostrar());
  }

}
