<?php
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/1/16
 * Time: 6:30 PM
 */

namespace LN\Entidades;

class MunicipioEstatus
{
    protected $id;
    protected $estatus;
    protected $totalProyectos;

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
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
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

}