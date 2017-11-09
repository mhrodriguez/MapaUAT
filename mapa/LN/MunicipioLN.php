<?php namespace LN;

/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/1/16
 * Time: 12:38 PM
 */

chdir('../BD');
include 'BD/MunicipioBD.php';

use BD\MunicipioBD;

class MunicipioLN
{

    function obtenerMunicipios()
    {
        $municipioBD = new MunicipioBD();

        return $municipioBD->obtenerMunicipios();
    }

    function obtenerMunicipiosEstatus($idMunicipio)
    {
        $municipioBD = new MunicipioBD();

        return $municipioBD->obtenerMunicipiosEstatus($idMunicipio);
    }

    function obtenerCoberturas()
    {
        $municipioBD = new MunicipioBD();

        return $municipioBD->obtenerCoberturas();
    }
}

?>