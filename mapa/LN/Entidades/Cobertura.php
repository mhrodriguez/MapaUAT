<?php
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/2/16
 * Time: 9:30 PM
 */

namespace LN\Entidades;

class Cobertura
{
    protected $id;
    protected $nombre;
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

?>