<?php namespace UI;
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 10/31/16
 * Time: 2:07 PM
 */


include 'LN/MunicipioLN.php';

use LN\MunicipioLN;

try {
    $municipioLN = new MunicipioLN();
    $listaMunicipios = $municipioLN->obtenerMunicipios();

    $listaCoberturas = $municipioLN->obtenerCoberturas();
}
catch (\Exception $ex)
{
    echo 'ERROR: ' . $ex->getMessage();
}

?>

<html>
    <header>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCsbzuJDUEOoq-jS1HO-LUXW4qo0gW9FNs"></script>
        <script type="text/javascript" src="js/mapa.js"></script>
        <link rel="stylesheet" type="text/css" href="css/mapa.css">
        <style>
            #map
            {
                width: 100%;
                height: 100%;
            }
            #barrainfo
            {
                position: absolute;
                background-color:aliceblue;
                width:100%;
                height:50px;
                opacity:0.7;
                top:0px;
                left:0px;
                z-index: 99;
            }
            #wrapper
            {
                position: relative;
                width: 100%;
                height: 100%;
            }
            .imgIndicador
            {
                margin-top:0px;
                width: 20px;
                height: 30px;
                margin-left: 25px;
            }
            .aIndicador
            {
                margin-top:-25px;
                font-family:Palatino Linotype;
            }
            #tblIndicador{
                width: 80%;
                height:100%;
                margin-left: 10%;
                margin-right: 10%;
            }
        </style>
    </header>
    <body>

        <div id="wrapper">
            <div id="barrainfo">
                <table id="tblIndicador">
                    <tr>
                <?php
                foreach ($listaCoberturas as $cobertura)
                {
                    echo '<td>';
                    echo '<img class="imgIndicador" src="' . $cobertura->getRutaMarcador() . '"></img>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a class="aIndicador">' . $cobertura->getNombre() . '</a>';
                    echo '</td>';
                }
                ?>
                    </tr>
                </table>
            </div>
            <div id="map" class="map">
            </div>
        </div>

    </body>

    <script>

        var mapa = new Mapa();
        mapa.initialize();

        <?php

        // Agregar marcadores
        foreach ($listaMunicipios as $municipio)
        {
            echo 'var info = new Array();';

            $listaMunicipioEstatus = $municipioLN->obtenerMunicipiosEstatus($municipio->getId());

            $index=0;
            foreach ($listaMunicipioEstatus as $municipioEstatus)
            {
                echo 'info[' . strval($index) . '] = new Array();';

                $estatus = str_replace("ó", '&#243;', $municipioEstatus->getEstatus());

                echo 'info[' . strval($index) . '][0] = ' .  $municipioEstatus->getId() . ';';
                echo 'info[' . strval($index) . '][1] = "' .  $estatus . '";';
                echo 'info[' . strval($index) . '][2] = "' .  strval($municipioEstatus->getTotalProyectos()) . '";';

                $index++;
            }

            echo 'mapa.agregarMarcador(' . strval($municipio->getLatitud()) . ', ' . strval($municipio->getLongitud()) . ', "' . $municipio->getNombre() . '", "' . strval($municipio->getTotalProyectos()) . '", info, ' . strval($municipio->getId()) . ', "' . $municipio->getRutaMarcador() . '");';
        }

        ?>
    </script>

    <script>
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        if(isMobile.any())
        {
            mapa.setZoom(7);

            var tblIndicador = document.getElementById('tblIndicador');
            tblIndicador.style.marginLeft="0px";
            tblIndicador.style.marginRight="0px";
        }
        else
        {

        }
    </script>

</html>

