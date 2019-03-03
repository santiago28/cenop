<?php

class Rangomovilidad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idRango;

    /**
     *
     * @var integer
     */
    public $idValoracion;

    /**
     *
     * @var string
     */
    public $rango;

    /**
     *
     * @var string
     */
    public $calificacion;

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'idRango' => 'idRango', 
            'idValoracion' => 'idValoracion', 
            'rango' => 'rango', 
            'calificacion' => 'calificacion'
        );
    }

}
