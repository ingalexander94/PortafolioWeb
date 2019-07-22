<?php

require_once '../modelo/DTO/UsuarioDTO.php';
require_once '../modelo/DAO/UsuarioDAO.php';

header('Content-Type: application/json');

$datosFormulario = file_get_contents('php://input');

$formularioArray = json_decode($datosFormulario);
$formularioArray = (array) $formularioArray;

class UsuarioCtrl
{

    public function iniciarSesionControlador($usuario, $clave)
    {
        $UsuarioDTO = new UsuarioDTO(null, null, $usuario, null, $clave);
        echo UsuarioDAO::iniciarSesion($UsuarioDTO);
    }

    public function estaLogueadoControlador($pestaña)
    {
        session_start();
        if (isset($_SESSION['Usuario'])) {
            $UsuarioDTO = unserialize($_SESSION['Usuario']);
            $arr = array(
                "err" => false,
                "mensaje" => "Tiene permisos",
                "id" => $UsuarioDTO->getId(),
                "nombres" => $UsuarioDTO->getNombres(),
                "apellidos" => $UsuarioDTO->getApellidos(),
                "documento" => $UsuarioDTO->getDocumento(),
                "correo" => $UsuarioDTO->getCorreo(),
                "contrasenia" => $UsuarioDTO->getClave(),
                "roles" => $UsuarioDTO->getRoles()
            );
            $roles = $UsuarioDTO->getRoles();
            if(strcmp($pestaña,"Ingresar")!==0){
                if(UsuarioCtrl::verificarPermiso($roles,$pestaña)===false){
                    $arr = array("err" => true, "mensaje" => "No tiene permisos.");
                }
            }
        } else {
            $arr = array("err" => true, "mensaje" => "No tiene permisos.");
        }
        echo json_encode($arr);
    }

    public function verificarPermiso($roles, $pestaña)
    {
        $exito = false;
        $permisoA = false;
        $permisoU = false;
        if (in_array("Administrador", $roles)) {
            $permisoA = UsuarioCtrl::validarPestanaAdministrador($pestaña);
        }

        if (in_array("Usuario", $roles)) {
            $permisoU = UsuarioCtrl::validarPestanaUsuario($pestaña);
        }

        if ($permisoA || $permisoU) {
            $exito = true;
        }
        return $exito;
    }

    public function validarPestanaUsuario($pestaña)
    {
        $exito = false;
        $pestañas = array("");
        if (in_array($pestaña, $pestañas)) {
            $exito = true;
        }
        return $exito;
    }

    public function validarPestanaAdministrador($pestaña)
    {
        $exito = false;
        $pestañas = array("Aplicacion","Taller");
        if (in_array($pestaña, $pestañas)) {
            $exito = true;
        }
        return $exito;
    }

    public function cerrarSesionControlador()
    {
        session_start();
        if (isset($_SESSION['Usuario'])) {
            session_destroy();
            $arr = array("err" => false, "mensaje" => "Se ha cerrado la sesión.");
        } else {
            $arr = array("err" => true, "mensaje" => "No ha iniciado una sesión.");
        }
        echo json_encode($arr);
    }
}

$controlador = new UsuarioCtrl();

$iniciarSesion = isset($formularioArray['admin'], $formularioArray['clave']);

$estaLogueado = isset($formularioArray['menuValidar']);
$cerrarSesion = isset($_GET['cerrarSesion']);

if ($iniciarSesion) {
    $controlador->iniciarSesionControlador($formularioArray['admin'], $formularioArray['clave']);
} else if ($estaLogueado) {
    $controlador->estaLogueadoControlador($formularioArray['menuValidar']);
} else if ($cerrarSesion) {
    $controlador->cerrarSesionControlador();
}
