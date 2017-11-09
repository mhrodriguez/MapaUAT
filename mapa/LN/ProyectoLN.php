<?php namespace LN;
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/2/16
 * Time: 1:25 PM
 */

chdir('../BD');
include 'BD/ProyectoBD.php';

use BD\ProyectoBD;

class ProyectoLN
{

    function obtenerProyectos($idMunicipio, $idEstatus)
    {
        $proyectoBD = new ProyectoBD();

        return $proyectoBD->obtenerProyectos($idMunicipio, $idEstatus);
    }
}

?>