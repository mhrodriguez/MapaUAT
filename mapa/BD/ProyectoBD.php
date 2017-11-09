<?php namespace BD;
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/2/16
 * Time: 12:47 PM
 */

chdir('../LN/Entidades');
include 'LN/Entidades/Proyecto.php';

use LN\Entidades\Proyecto;
use LN\Entidades\ProyectoEstatus;

class ProyectoBD
{

    function obtenerProyectos($idMunicipio, $idEstatus)
    {
        $listaProyectos = array();

        // 1. Conectarse a la BD
        $conexion = $this->obtenerConexion();
        if ($conexion->connect_error) {
            throw new \Exception('Error al conectarse a la base de datos');
        }

        // 2. Ejecutar query
        $stmt = $conexion->prepare('call proc_desglose_proyectos_mpo_estatus(' . strval($idMunicipio) . ', ' . strval($idEstatus) . ')');
        $stmt->execute();
        $stmt->bind_result($numero, $titulo, $responsable, $fondo);

        while ($stmt->fetch()) {
            $proyecto = new Proyecto();

            $proyecto->setNumero($numero);
            $proyecto->setTitulo($titulo);
            $proyecto->setResponsable($responsable);
            $proyecto->setFondo($fondo);

            array_push($listaProyectos, $proyecto);
        }

        $stmt->close();
        $conexion->close();

        return $listaProyectos;
    }

    function obtenerConexion()
    {
        $mysqli = new \mysqli('localhost', 'mario', '1pGMtIje0wyoGjp7x', 'uat_geolocalizacion_proy');

        return $mysqli;
    }
}

?>