<?php namespace UI;
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/2/16
 * Time: 12:09 PM
 */

$idMunicipio=$_GET['idMunicipio'];
$idEstatus=$_GET['idEstatus'];


include 'LN/ProyectoLN.php';

use LN\ProyectoLN;

try {
    $proyectoLN = new ProyectoLN();
    $listaProyectos = $proyectoLN->obtenerProyectos($idMunicipio, $idEstatus);
}
catch (\Exception $ex)
{
    echo 'ERROR: ' . $ex->getMessage();
}

?>

<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style>
        body
        {
            margin-left:150px;
            margin-right:150px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/mapa.css">
</header>
<body>

    <button onclick="window.history.back();">&lt; Regresar al mapa</button>

    <br><br><br>

    <table class="estilo1">
        <tr>
            <td><b>N&uacute;mero</b></td>
            <td><b>T&iacute;tulo</b></td>
            <td><b>Responsable</b></td>
            <td><b>Fondo</b></td>
        </tr>
        <tbody>
        <?php
            foreach ($listaProyectos as $proyecto)
            {
                echo '<tr>';

                echo '<td>' . strval($proyecto->getNumero()) . '</td>';
                echo '<td>' . $proyecto->getTitulo() . '</td>';
                echo '<td>' . $proyecto->getResponsable() . '</td>';
                echo '<td>' . $proyecto->getFondo() . '</td>';

                echo '</tr>';
            }
        ?>
        </tbody>
    </table>

</body>
</html>
