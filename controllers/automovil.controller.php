<?php
//CONTROLADOR APROVECHA LAS FUNCIONALIDADES DEFINIDAS/CONSTRUIDAS
//EN EL MODELO (pero el MODELO necesita TABLAS y los SPU)
require_once '../models/automovil.model.php';

if (isset($_POST['operacion'])){

  $automovil = new Automovil();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $automovil->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

  if ($_POST['operacion'] == 'registrar'){
    //Capturar los datos
    $datosGuardar = [
      "marca" => $_POST["marca"],
      "modelo" => $_POST["modelo"],
      "precio" => $_POST["precio"],
      "tipocombustible" => $_POST["tipocombustible"],
      "color" => $_POST["color"]
    ];

    $seRegistro = $automovil->registrar($datosGuardar);
    echo json_encode(["status" => $seRegistro]);
  } 

  if ($_POST['operacion'] == 'eliminar'){
    $status = $automovil->eliminar($_POST["idautomovil"]);
    echo json_encode(["status" => $status]);
  } 

  if ($_POST['operacion'] == 'buscar'){
      $datos = $automovil->busarAuto($_POST["idautomovil"]);
      echo json_encode($datos);
    }

    if ($_POST['operacion'] == 'editar'){
      //Capturar los datos
      $datosGuardar = [
        "marca" => $_POST["marca"],
        "modelo" => $_POST["modelo"],
        "precio" => $_POST["precio"],
        "tipocombustible" => $_POST["tipocombustible"],
        "color" => $_POST["color"],
        "idautomovil" => $_POST["idautomovil"]
      ];
  
      $seRegistro = $automovil->editarAutomovil($datosGuardar);
      echo json_encode(["status" => $seRegistro]);
    } 
  
}