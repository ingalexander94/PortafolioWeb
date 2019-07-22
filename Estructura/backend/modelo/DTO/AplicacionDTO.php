<?php

class AplicacionDTO{

    private $id;
    private $titulo;
    private $link;
    private $foto;
    private $fecha;
    private $descripcion;

    function __construct($titulo,$link,$foto,$fecha,$descripcion)
    {
        $this->titulo = $titulo;
        $this->link = $link;
        $this->foto = $foto;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
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
    function getFoto()
    {
        return $this->foto;
    }

    function setFoto($foto)
    {
        $this->foto = $foto;
    }
    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    

}
