<?php

require_once '../modelo/DTO/AplicacionDTO.php';
require_once '../modelo/DAO/AplicacionDAO.php';

header('Content-Type: application/json')
;


$datosFormulario = file_get_contents('php://input');

$formularioArray = json_decode($datosFormulario);
$formularioArray = (array) $formularioArray;

class AplicacionCtrl{

    public function crearAplicacionControlador($titulo,$link,$fecha,$descripcion,$tecnologias){
        $AplicacionDTO = new AplicacionDTO($titulo,$link,"frontend/assets/archivo/sinFoto.jpg",$fecha,$descripcion);
        $exito =  AplicacionDAO::crearAplicacion($AplicacionDTO,$tecnologias);
        if ($exito) {
            echo json_encode(array("err" => false));
        } else {
            echo json_encode(array("err" => true, "mensaje" => "Ya existe una aplicación con ese titulo."));
        }
    }

    public function actualizarAplicacionControlador($id,$titulo,$link,$fecha,$descripcion,$tecnologias){
        $AplicacionDTO = new AplicacionDTO($titulo,$link,"",$fecha,$descripcion);
        $AplicacionDTO->setId($id);
        $exito =  AplicacionDAO::actualizarAplicacion($AplicacionDTO,$tecnologias);
        if ($exito) {
            echo json_encode(array("err" => false, "mensaje" => "Aplicación actualizada"));
        } else {
            echo json_encode(array("err" => true, "mensaje" => "Ya existe una aplicación con ese titulo."));
        }
    }

    public function listarTecnologiasControlador(){
        echo AplicacionDAO::listarTecnologias();
    }

    public function listarTecnologiasSeleccionadasControlador($aplicacion){
        echo AplicacionDAO::listarTecnologiasSeleccionadas($aplicacion);
    }

    public function listarAplicacionesControlador(){
        echo AplicacionDAO::listarAplicaciones();
    }

    public function mostrarAplicacionControlador($aplicacion)
    {
        echo AplicacionDAO::mostrarAplicacion($aplicacion);
    }

    public function eliminarAplicacionControlador($aplicacion){
        $exito =  AplicacionDAO::eliminarAplicacion($aplicacion);
        if ($exito) {
            echo json_encode(array("err" => false, "mensaje" => "Aplicacion Eliminada"));
        } else {
            echo json_encode(array("err" => true, "mensaje" => "Error al intentar eliminar la aplicación."));
        }
    }

}

$controlador = new AplicacionCtrl();

$crearAplicacion = isset($formularioArray['titulo'],$formularioArray['link'],$formularioArray['fecha'],$formularioArray['descripcion'],$formularioArray['tecnologias']);
$eliminarAplicacion = isset($formularioArray['idAplicacionEliminar']);
$mostrarAplicacion = isset($formularioArray['editarAplicacion']);
$listarTecnologiasSeleccionadas = isset($formularioArray['tecnologiasAplicacion']);
$actualizarAplicacion = isset($formularioArray['idActualizar'],$formularioArray['tituloActualizar'],$formularioArray['linkActualizar'],$formularioArray['fechaActualizar'],$formularioArray['descripcionActualizar'],$formularioArray['tecnologiasActualizar']);

$listarTecnologias = isset($_GET['listarTecnologias']);
$listarAplicaciones = isset($_GET['listarAplicaciones']);


if($listarTecnologias){
    $controlador->listarTecnologiasControlador();
}else if($crearAplicacion){
    $controlador->crearAplicacionControlador($formularioArray['titulo'],$formularioArray['link'],$formularioArray['fecha'],$formularioArray['descripcion'],$formularioArray['tecnologias']);
}else if($listarAplicaciones){
    $controlador->listarAplicacionesControlador();
}else if($eliminarAplicacion){
    $controlador->eliminarAplicacionControlador($formularioArray['idAplicacionEliminar']);
}else if($mostrarAplicacion){
    $controlador->mostrarAplicacionControlador($formularioArray['editarAplicacion']);
}else if($listarTecnologiasSeleccionadas) {
     $controlador->listarTecnologiasSeleccionadasControlador($formularioArray['tecnologiasAplicacion']);
}else if($actualizarAplicacion){
    $controlador->actualizarAplicacionControlador($formularioArray['idActualizar'],$formularioArray['tituloActualizar'],$formularioArray['linkActualizar'],$formularioArray['fechaActualizar'],$formularioArray['descripcionActualizar'],$formularioArray['tecnologiasActualizar']);
}

?>