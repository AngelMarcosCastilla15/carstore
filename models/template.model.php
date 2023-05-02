<?php

require_once 'Conexion.php';

class Template extends Conexion{

  private $conexion;

  //Constructor
  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listar(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_demo_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

  //Este método deberá retornar un arreglo conteniendo la información
  //además del estado (status)
  public function registrar($datos = []){
    try{
      $consulta = $this->conexion->prepare("CALL spu_demo_registrar(?,?)");
      $consulta->execute(
        array(
          $datos["campo1"],
          $datos["campo2"]
        )
      );
    }
    catch(Exception $e){
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

}