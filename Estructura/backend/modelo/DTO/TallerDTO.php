<?php

class TallerDTO{

    private $id;
    private $titulo;
    private $link;
    private $archivo;
    private $fecha;
    private $nombre;
    private $descripcion;
    private $curso;

    function __construct($titulo,$link,$archivo,$fecha,$nombre,$descripcion,$curso)
    {
        $this->titulo = $titulo;
        $this->link = $link;
        $this->archivo = $archivo;
        $this->fecha = $fecha;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->curso = $curso;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    function getLink()
    {
        return $this->link;
    }

    function setLink($link)
    {
        $this->link = $link;
    }
    function getArchivo()
    {
        return $this->archivo;
    }

    function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }
    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre= $nombre;
    }
    function getDescripcion()
    {
        return $this->descripcion;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    function getCurso()
    {
        return $this->curso;
    }

    function setCurso($curso)
    {
        $this->curso = $curso;
    }

}


?>