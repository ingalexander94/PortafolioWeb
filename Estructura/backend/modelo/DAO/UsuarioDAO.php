<?php

include_once("../Conexion.php");

class UsuarioDAO
{

    function iniciarSesion($UsuarioDTO){
        $correo = $UsuarioDTO->getCorreo();
        $clave = $UsuarioDTO->getClave();
        $sql = 'SELECT * FROM usuario WHERE correo="'.$correo.'" AND contrasenia = "'.$clave.'";';
        $datos = Conexion::obtenerFila($sql);
        if($datos===false){
        $arr = array("err" => true, "mensaje" => "Los datos son incorrectos.");
        }else{
        $UsuarioDTO->setNombres($datos['nombres']);
        $UsuarioDTO->setApellidos($datos['apellidos']);
        $UsuarioDTO->setDocumento($datos['documento']);
        $UsuarioDTO->setId($datos['id']);
        $roles = UsuarioDAO::obtenerRolesUsuario($datos['id']);
        $arreglo = array();
        for($i=0;$i<count($roles);$i++){
            $arreglo[] = $roles[$i]['rol'];  
        }
        $UsuarioDTO->setRoles($arreglo);
        $arr = array(
           "err" => false,
           "mensaje" => "Sesión iniciada",
           "id" => $UsuarioDTO->getId(),
           "nombres" => $UsuarioDTO->getNombres(),
           "apellidos" => $UsuarioDTO->getApellidos(),
           "documento" => $UsuarioDTO->getDocumento(),
           "correo" => $UsuarioDTO->getCorreo(),
           "contrasenia" => $UsuarioDTO->getClave(),
           "roles" => $UsuarioDTO->getRoles()
        );
        session_start();
        $_SESSION['Usuario'] = serialize($UsuarioDTO);
        }
        echo json_encode($arr);
    }

    function obtenerRolesUsuario($id){
        $sql = "SELECT rol.nombre AS rol FROM rol INNER JOIN usuariorol ON rol.id = usuariorol.rol WHERE usuariorol.usuario =".$id.";";
        $roles = Conexion::obtenerFilas($sql);
        return $roles;
    }

}
