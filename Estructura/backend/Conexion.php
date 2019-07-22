<?php

class Conexion
{
    private $conexion;
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $nombreBaseDatos = "portafolio";

    private static $instancia;

    public static function obtenerInstancia()
    {
        if (!isset(self::$instancia)) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }

    public function __construct()
    {
        try {

            $this->conexion = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->nombreBaseDatos . "", $this->usuario, $this->contrasenia, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));;
        } catch (Exception $ex) {
            throw new Exception("Se presento un error al conectar con la base de datos");
        }
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }

    private function esTexto($sql)
    {
        if (!is_string($sql)) {
            trigger_error('El sql enviado no es una cadena de texto aceptada' . $sql);
            return false;
        } else {
            return true;
        }
    }

    public function obtenerFilasJSON($sql)
    {
        if (!self::esTexto($sql))
            exit();

        $baseDatos = Conexion::obtenerInstancia();
        $conexion = $baseDatos->obtenerConexion();
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $filas = $consulta->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($filas);
    }

    public function obtenerFilaJSON($sql)
    {
        if (!self::esTexto($sql))
            exit();

        $baseDatos = Conexion::obtenerInstancia();
        $conexion = $baseDatos->obtenerConexion();
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $fila = $consulta->fetch();
        echo json_encode($fila);
    }

    public function obtenerFila($sql)
    {
        if (!self::esTexto($sql))
            exit();

        $baseDatos = Conexion::obtenerInstancia();
        $conexion = $baseDatos->obtenerConexion();
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $fila = $consulta->fetch();
        return $fila;
    }

    public function obtenerFilas($sql)
    {
        if (!self::esTexto($sql))
            exit();

        $baseDatos = Conexion::obtenerInstancia();
        $conexion = $baseDatos->obtenerConexion();
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $fila = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }


    public function obtenerValor($sql, $columna)
    {
        if (!self::esTexto($sql))
            exit();

        $baseDatos = Conexion::obtenerInstancia();
        $conexion = $baseDatos->obtenerConexion();
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $valor = null;
        $filas = $consulta->rowCount();
        if ($filas > 0) {
            $fila = $consulta->fetch();
            $valor = $fila[$columna];
        }
        return $valor;
    }

    public function ejecutaIDU($sql)
    {
        if (!self::esTexto($sql))
            exit();

        $baseDatos = Conexion::obtenerInstancia();
        $conexion = $baseDatos->obtenerConexion();
        $consulta = $conexion->prepare($sql);
        $exito = $consulta->execute();
        return $exito;
    }
}
