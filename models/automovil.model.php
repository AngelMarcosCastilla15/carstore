<?php

require_once 'Conexion.php';

class Automovil extends Conexion
{

  private $conexion;

  //Constructor
  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listar()
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_listar_automoviles()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

  //Este método deberá retornar un arreglo conteniendo la información
  //además del estado (status)
  public function registrar($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_crear_automovil(?,?,?,?,?)");
      return $consulta->execute(
        array(
          $datos["marca"],
          $datos["modelo"],
          $datos["precio"],
          $datos["tipocombustible"],
          $datos["color"]
        )
      );
    } catch (Exception $e) {
     return false;
    }
  }

  public function busarAuto($idautomovil)
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_obtener_automovil(?)");
      $consulta->execute(
        array(
          $idautomovil
        )
      );
      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

  public function eliminar($idautomovil)
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_eliminar_automovil(?)");
      return $consulta->execute(
        array(
          $idautomovil
        )
      );
    } catch (Exception $e) {
     return false;
    }
  }
  
 public function editarAutomovil($datos =[]){
    try{
      $consulta = $this->conexion->prepare("CALL spu_editar_automovil(?,?,?,?,?,?)");
      return $consulta->execute(
        array(
          $datos["marca"],
          $datos["modelo"],
          $datos["precio"],
          $datos["tipocombustible"],
          $datos["color"],
          $datos["idautomovil"]
        )
      );
    }catch(xception $e){
      return false;
    }
  }  
}