<?php
/**
 * Created by PhpStorm.
 * User: davatar
 * Date: 11/2/16
 * Time: 12:44 PM
 */

namespace LN\Entidades;


class Proyecto
{
    protected $numero;
    protected $titulo;
    protected $responsable;
    protected $fondo;

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param mixed $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /**
     * @return mixed
     */
    public function getFondo()
    {
        return $this->fondo;
    }

    /**
     * @param mixed $fondo
     */
    public function setFondo($fondo)
    {
        $this->fondo = $fondo;
    }



}