<?php

require_once '../modelo/DTO/TallerDTO.php';
require_once '../modelo/DAO/TallerDAO.php';

header('Content-Type: application/json')
;


$datosFormulario = file_get_contents('php://input');

$formularioArray = json_decode($datosFormulario);
$formularioArray = (array) $formularioArray;

class TallerCtrl{

    public function crearTallerControlador($titulo,$link,$archivo,$fecha,$nombre,$descripcion,$curso)
    {
        $TallerDTO = new TallerDTO($titulo,$link,$archivo,$fecha,$nombre,$descripcion,$curso);
        $exito =  TallerDAO::crearTaller($TallerDTO);
        if ($exito) {
            echo json_encode(array("err" => false, "mensaje" => "Taller Creado"));
        } else {
            echo json_encode(array("err" => true, "mensaje" => "Error al intentar crear el taller."));
        }
    }

    public function actualizarTallerControlador($id,$titulo,$link,$archivo,$fecha,$nombre,$descripcion,$curso)
    {
        $TallerDTO = new TallerDTO($titulo,$link,$archivo,$fecha,$nombre,$descripcion,$curso);
        $exito =  TallerDAO::actualizarTaller($TallerDTO,$id);
        if ($exito) {
            echo json_encode(array("err" => false, "mensaje" => "Taller Actualizado"));
        } else {
            echo json_encode(array("err" => true, "mensaje" => "Error al intentar actualizar el taller."));
        }
    }

    public function listarTalleresControlador()
    {
        echo TallerDAO::listarTalleres();
    }

    public function listarTalleresAnalisisControlador()
    {
        echo TallerDAO::listarTalleresAnalisis();
    }

    public function listarTalleresIngenieriaControlador()
    {
        echo TallerDAO::listarTalleresIngenieria();
    }

    public function mostrarTallerControlador($taller)
    {
        echo TallerDAO::mostrarTaller($taller);
    }

    public function eliminarTallerControlador($taller){
        $exito =  TallerDAO::eliminarTaller($taller);
        if ($exito) {
            echo json_encode(array("err" => false, "mensaje" => "Taller Eliminado"));
        } else {
            echo json_encode(array("err" => true, "mensaje" => "Error al intentar eliminar el taller."));
        }
    }

}

$controlador = new TallerCtrl();

$crearTaller = isset($formularioArray['titulo'],$formularioArray['link'],$formularioArray['archivo'],$formularioArray['fecha'],$formularioArray['nombre'],$formularioArray['descripcion'],$formularioArray['curso']);

$actualizarTaller = isset($formularioArray['idActualizar'],$formularioArray['tituloActualizar'],$formularioArray['linkActualizar'],$formularioArray['archivoActualizar'],$formularioArray['fechaActualizar'],$formularioArray['nombreActualizar'],$formularioArray['descripcionActualizar'],$formularioArray['cursoActualizar']);

$listarTalleres = isset($_GET['listarTalleres']);
$eliminarTaller = isset($formularioArray['idTallerEliminar']);
$mostrarTaller = isset($formularioArray['editarTaller']);

$listarTalleresAnalisis = isset($_GET['listarTalleresAnalisis']);
$listarTalleresIngenieria = isset($_GET['listarTalleresIngenieria']);

if($crearTaller){
    $controlador->crearTallerControlador($formularioArray['titulo'],$formularioArray['link'],$formularioArray['archivo'],$formularioArray['fecha'],$formularioArray['nombre'],$formularioArray['descripcion'],$formularioArray['curso']);
}else if($listarTalleres){
    $controlador->listarTalleresControlador();
}else if($eliminarTaller){
    $controlador->eliminarTallerControlador($formularioArray['idTallerEliminar']);
}else if($mostrarTaller){
    $controlador->mostrarTallerControlador($formularioArray['editarTaller']);
}else if($actualizarTaller){
    $controlador->actualizarTallerControlador($formularioArray['idActualizar'],$formularioArray['tituloActualizar'],$formularioArray['linkActualizar'],$formularioArray['archivoActualizar'],$formularioArray['fechaActualizar'],$formularioArray['nombreActualizar'],$formularioArray['descripcionActualizar'],$formularioArray['cursoActualizar']);
}else if($listarTalleresAnalisis){
    $controlador->listarTalleresAnalisisControlador();
}else if($listarTalleresIngenieria){
    $controlador->listarTalleresIngenieriaControlador();
}

?>