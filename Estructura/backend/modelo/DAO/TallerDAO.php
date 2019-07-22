<?php

include_once("../Conexion.php");

class TallerDAO
{

    function crearTaller($TallerDTO)
    {
        $titulo = $TallerDTO->getTitulo();
        $link = $TallerDTO->getLink();
        $archivo = $TallerDTO->getArchivo();
        $fecha = $TallerDTO->getFecha();
        $nombre = $TallerDTO->getNombre();
        $descripcion = $TallerDTO->getDescripcion();
        $curso = $TallerDTO->getCurso();

        $sql = 'INSERT INTO taller (titulo,link,archivo,fecha,nombre,descripcion,curso) VALUES ("' . $titulo . '","' . $link . '",' . $archivo . ',"' . $fecha . '","' . $nombre . '","' . $descripcion . '",' . $curso . ')';

        return Conexion::ejecutaIDU($sql);
    }

    function actualizarTaller($TallerDTO,$id)
    {
        $titulo = $TallerDTO->getTitulo();
        $link = $TallerDTO->getLink();
        $archivo = $TallerDTO->getArchivo();
        $fecha = $TallerDTO->getFecha();
        $nombre = $TallerDTO->getNombre();
        $descripcion = $TallerDTO->getDescripcion();
        $curso = $TallerDTO->getCurso();

        $sql = 'UPDATE taller SET titulo="'.$titulo.'", link="'.$link.'", archivo ='.$archivo.',fecha ="'.$fecha.'", nombre ="'.$nombre.'", descripcion="'.$descripcion.'", curso='.$curso.' WHERE id='.$id;

        return Conexion::ejecutaIDU($sql);
    }

    function listarTalleres()
    {
        $sql = 'SELECT taller.id,taller.link,taller.fecha,taller.nombre,taller.descripcion,taller.titulo,tipo.extension AS archivo,tipo.foto,curso.nombre AS curso FROM taller INNER JOIN tipo ON taller.archivo = tipo.id INNER JOIN curso ON taller.curso = curso.id;';
        echo Conexion::obtenerFilasJSON($sql);
    }

    function listarTalleresAnalisis()
    {
        $sql = 'SELECT taller.id,taller.link,taller.fecha,taller.nombre,taller.descripcion,taller.titulo,tipo.extension AS archivo,tipo.foto,curso.nombre AS curso FROM taller INNER JOIN tipo ON taller.archivo = tipo.id INNER JOIN curso ON taller.curso = curso.id WHERE curso.id = 1;';
        echo Conexion::obtenerFilasJSON($sql);
    }

    function listarTalleresIngenieria()
    {
        $sql = 'SELECT taller.id,taller.link,taller.fecha,taller.nombre,taller.descripcion,taller.titulo,tipo.extension AS archivo,tipo.foto,curso.nombre AS curso FROM taller INNER JOIN tipo ON taller.archivo = tipo.id INNER JOIN curso ON taller.curso = curso.id WHERE curso.id = 2;';
        echo Conexion::obtenerFilasJSON($sql);
    }

    function eliminarTaller($taller){
        $sql = 'DELETE FROM taller WHERE id ='.$taller;
        return Conexion::ejecutaIDU($sql);
    }

    function mostrarTaller($taller){
        $sql = 'SELECT * FROM taller WHERE taller.id ='.$taller;
        echo Conexion::obtenerFilaJSON($sql);
    }
}
