<?php namespace BD;
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/1/16
 * Time: 1:54 PM
 */

chdir('../LN/Entidades');
include 'LN/Entidades/Municipio.php';
include 'LN/Entidades/Cobertura.php';
include 'LN/Entidades/MunicipioEstatus.php';

use LN\Entidades\Municipio;
use LN\Entidades\MunicipioEstatus;
use LN\Entidades\Cobertura;

class MunicipioBD
{

    function obtenerMunicipios()
    {
        $listaMunicipios = array();

        // 1. Conectarse a la BD
        $conexion = $this->obtenerConexion();
        if ($conexion->connect_error) {
            throw new \Exception('Error al conectarse a la base de datos');
        }

        // 2. Ejecutar query
        $stmt = $conexion->prepare('SELECT id, municipio, latitud, longitud, total_proyectos, rutaMarcador FROM vista_total_proyectos_por_mpo');
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $latitud, $longitud, $total_proyectos, $rutaMarcador);

        while ($stmt->fetch()) {
            $municipio = new Municipio();

            $municipio->setId($id);
            $municipio->setNombre($nombre);
            $municipio->setLatitud($latitud);
            $municipio->setLongitud($longitud);
            $municipio->setTotalProyectos($total_proyectos);
            $municipio->setRutaMarcador($rutaMarcador);

            array_push($listaMunicipios, $municipio);
        }

        $stmt->close();
        $conexion->close();

       return $listaMunicipios;
    }

    function obtenerMunicipiosEstatus($idMunicipio)
    {
        $listaMunicipiosEstatus = array();

        // 1. Conectarse a la BD
        $conexion = $this->obtenerConexion();
        if ($conexion->connect_error) {
            throw new \Exception('Error al conectarse a la base de datos');
        }

        // 2. Ejecutar query
            $stmt = $conexion->prepare('call proc_total_proyectos_mpo_estatus(' . strval($idMunicipio) . ');');
        $stmt->execute();
        $stmt->bind_result($id, $estatus, $total_proyectos);

        while ($stmt->fetch()) {
            $municipioEstatus = new MunicipioEstatus();

            $municipioEstatus->setId($id);
            $municipioEstatus->setEstatus($estatus);
            $municipioEstatus->setTotalProyectos($total_proyectos);

            array_push($listaMunicipiosEstatus, $municipioEstatus);
        }

        $stmt->close();
        $conexion->close();

        return $listaMunicipiosEstatus;
    }

    function obtenerCoberturas()
    {
        $listaCoberturas = array();

        // 1. Conectarse a la BD
        $conexion = $this->obtenerConexion();
        if ($conexion->connect_error) {
            throw new \Exception('Error al conectarse a la base de datos');
        }

        // 2. Ejecutar query
        $stmt = $conexion->prepare('SELECT id, nombre, rutaMarcador FROM COBERTURA');
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $rutaMarcador);

        while ($stmt->fetch()) {
            $cobertura = new Cobertura();

            $cobertura->setId($id);
            $cobertura->setNombre($nombre);
            $cobertura->setRutaMarcador($rutaMarcador);

            array_push($listaCoberturas, $cobertura);
        }

        $stmt->close();
        $conexion->close();

        return $listaCoberturas;

    }

    function obtenerConexion()
    {
        $mysqli = new \mysqli('localhost', 'mario', '1pGMtIje0wyoGjp7', 'uat_geolocalizacion_proy');

        return $mysqli;
    }


}

?>