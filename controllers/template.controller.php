<?php
//CONTROLADOR APROVECHA LAS FUNCIONALIDADES DEFINIDAS/CONSTRUIDAS
//EN EL MODELO (pero el MODELO necesita TABLAS y los SPU)
require_once '../models/template.model.php';

if (isset($_POST['operacion'])){

  $template = new Template();

  if ($_POST['operacion'] == 'listar'){

    //VERSIÓN 1 (corta)
    //echo json_encode($template->listar());

    //VERSIÓN 2 (larga)
    $datosObtenidos = $template->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

  if ($_POST['operacion'] == 'registrar'){
    //Capturar los datos
    $datosGuardar = [
      "campo1"    => $_POST['campo1'],
      "campo2"    => $_POST['campo2']
    ];

    $respuesta = $template->registrar($datosGuardar);
    echo json_encode($respuesta);
  }

}