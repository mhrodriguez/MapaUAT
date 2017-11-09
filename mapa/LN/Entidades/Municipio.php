<?php

/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/1/16
 * Time: 12:35 PM
 */

namespace LN\Entidades;

class Municipio
{
    protected $id;
    protected $nombre;
    protected $latitud;
    protected $longitud;
    protected $totalProyectos;
    protected $rutaMarcador;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return mixed
     */
    public function getTotalProyectos()
    {
        return $this->totalProyectos;
    }

    /**
     * @param mixed $totalProyectos
     */
    public function setTotalProyectos($totalProyectos)
    {
        $this->totalProyectos = $totalProyectos;
    }


    /**
     * @return mixed
     */
    public function getRutaMarcador()
    {
        return $this->rutaMarcador;
    }

    /**
     * @param mixed $rutaMarcador
     */
    public function setRutaMarcador($rutaMarcador)
    {
        $this->rutaMarcador = $rutaMarcador;
    }
}