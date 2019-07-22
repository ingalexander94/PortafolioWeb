<?php

$titulo = $_POST['titulo'];
$filename = $_FILES['file']['name'];
$location = $_SERVER['DOCUMENT_ROOT'].'/Estructura/frontend/assets/aplicacion/';
move_uploaded_file($_FILES['file']['tmp_name'],$location.$filename);
require_once '../modelo/DAO/AplicacionDAO.php';
$ruta = 'frontend/assets/aplicacion/'.$filename;
$actualizar = AplicacionDAO::actualizarFoto($ruta,$titulo);
if($actualizar){
    $arr = array("err" => false, "mensaje" => "Lista actualizada");
}else{
    $arr = array("err" => true, "mensaje" => "La foto no se guardo");
}

echo json_encode($arr);