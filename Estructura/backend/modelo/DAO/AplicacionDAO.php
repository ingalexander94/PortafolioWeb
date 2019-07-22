<?php

include_once("../Conexion.php");

class AplicacionDAO
{

    function listarTecnologias()
    {
        $sql = 'SELECT * FROM tecnologia;';
        echo Conexion::obtenerFilasJSON($sql);
    }

    function listarTecnologiasSeleccionadas($aplicacion)
    {
        $sql = 'SELECT aplicaciontecnologia.id,aplicaciontecnologia.aplicacion, aplicaciontecnologia.tecnologia, tecnologia.nombre,tecnologia.foto,tecnologia.color FROM aplicaciontecnologia INNER JOIN tecnologia ON aplicaciontecnologia.tecnologia = tecnologia.id WHERE aplicacion ='.$aplicacion;
        echo Conexion::obtenerFilasJSON($sql);
    }

    function eliminarAplicacion($aplicacion)
    {
        $sql = 'SELECT * FROM aplicacion WHERE id = '.$aplicacion.';';
        $foto = Conexion::obtenerValor($sql,"foto");
        if(strcmp($foto,"frontend/assets/archivo/sinFoto.jpg") !== 0){
            unlink($_SERVER['DOCUMENT_ROOT'].'/Estructura'.'/'.$foto);
        }
        $sql = 'DELETE FROM aplicacion WHERE id ='.$aplicacion;
        return Conexion::ejecutaIDU($sql);
    }

    function listarAplicaciones()
    {
        $sql = 'SELECT * FROM aplicacion;';
        echo Conexion::obtenerFilasJSON($sql);
    }

    function mostrarAplicacion($aplicacion){
        $sql = 'SELECT * FROM aplicacion WHERE aplicacion.id ='.$aplicacion;
        echo Conexion::obtenerFilaJSON($sql);
    }

    function crearAplicacion($AplicacionDTO, $tecnologias)
    {
        $titulo = $AplicacionDTO->getTitulo();
        $link = $AplicacionDTO->getLink();
        $foto = $AplicacionDTO->getFoto();
        $fecha = $AplicacionDTO->getFecha();
        $descripcion = $AplicacionDTO->getDescripcion();
        $existe = AplicacionDAO::buscarAplicacion($titulo);
        if (!is_null($existe)) {
            return false;
        }
        $sql = 'INSERT INTO aplicacion (titulo,foto,descripcion,link,fecha) VALUES ("' . $titulo . '","' . $foto . '","' . $descripcion . '","' . $link . '","' . $fecha . '");';
        Conexion::ejecutaIDU($sql);
        $id = AplicacionDAO::buscarAplicacion($titulo);
        return AplicacionDAO::añadirTecnologias($id, $tecnologias);
    }

    function actualizarAplicacion($AplicacionDTO, $tecnologias)
    {
        $titulo = $AplicacionDTO->getTitulo();
        $link = $AplicacionDTO->getLink();
        $id = $AplicacionDTO->getId();
        $fecha = $AplicacionDTO->getFecha();
        $descripcion = $AplicacionDTO->getDescripcion();
        $sql = 'UPDATE aplicacion SET titulo = "'.$titulo.'", link = "'.$link.'", fecha = "'.$fecha.'", descripcion = "'.$descripcion.'" WHERE id='.$id.';';
        Conexion::ejecutaIDU($sql);
        $id = AplicacionDAO::buscarAplicacion($titulo);
        AplicacionDAO::eliminarTecnologias($id);
        return AplicacionDAO::añadirTecnologias($id, $tecnologias);
    }

    function eliminarTecnologias($id)
    {
        $sql = "DELETE FROM aplicaciontecnologia WHERE aplicacion = ".$id;
        return Conexion::ejecutaIDU($sql);
    }

    function añadirTecnologias($id, $tecnologias)
    {
        $cadena = "INSERT INTO aplicaciontecnologia (aplicacion,tecnologia) VALUES";
        for ($i = 0; $i < count($tecnologias); $i++) {
            $cadena .= '(' . $id . ',' . $tecnologias[$i] . '),';
        }
        $sql = substr($cadena, 0, -1);
        $sql .= ';';
        return Conexion::ejecutaIDU($sql);
    }

    function buscarAplicacion($titulo)
    {
        $sql = 'SELECT * FROM aplicacion WHERE titulo = "' . $titulo . '";';
        return Conexion::obtenerValor($sql, "id");
    }

    function actualizarFoto($link,$titulo){
        
        $sql = 'SELECT * FROM aplicacion WHERE titulo = "'.$titulo.'";';
        $foto = Conexion::obtenerValor($sql,"foto");
        if(strcmp($foto,"frontend/assets/archivo/sinFoto.jpg") !== 0){
            unlink($_SERVER['DOCUMENT_ROOT'].'/Estructura'.'/'.$foto);
        }
        $sql = 'UPDATE aplicacion SET foto = "'.$link.'" WHERE titulo = "'.$titulo.'"';
        return Conexion::ejecutaIDU($sql);
    }
}
