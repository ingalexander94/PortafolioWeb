<?php

class UsuarioDTO{

    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $documento;
    private $clave;
    private $roles;

    function __construct($nombres,$apellidos,$correo,$documento,$clave)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->documento = $documento;
        $this->clave = $clave;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getNombres()
    {
        return $this->nombres;
    }

    function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    function getApellidos()
    {
        return $this->apellidos;
    }

    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    function getCorreo()
    {
        return $this->correo;
    }

    function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    function getDocumento()
    {
        return $this->documento;
    }

    function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    function getClave()
    {
        return $this->clave;
    }

    function setClave($clave)
    {
        $this->clave = $clave;
    }

    function getRoles()
    {
        return $this->roles;
    }

    function setRoles($roles)
    {
        $this->roles = $roles;
    }

   
}
