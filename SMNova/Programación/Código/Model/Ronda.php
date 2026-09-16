<?php

class Ronda {
    private $id_ronda;
    private $id_torneo;
    private $numero_ronda;
    private $fecha;
    private $estado;

    public function __construct($id_ronda = null, $id_torneo = null, $numero_ronda = null, $fecha = null, $estado = null) {
        $this->id_ronda = $id_ronda;
        $this->id_torneo = $id_torneo;
        $this->numero_ronda = $numero_ronda;
        $this->fecha = $fecha;
        $this->estado = $estado;
    }
    //Getters y Setters
    public function getId_ronda()
    {
        return $this->id_ronda;
    }

    public function setId_ronda($id_ronda) : void
    {
        $this->id_ronda = $id_ronda;
    }

    public function getId_torneo()
    {
        return $this->id_torneo;
    }

    public function setId_torneo($id_torneo) : void
    {
        $this->id_torneo = $id_torneo;
    }

    public function getNumero_ronda()
    {
        return $this->numero_ronda;
    }

    public function setNumero_ronda($numero_ronda) : void
    {
        $this->numero_ronda = $numero_ronda;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha) : void
    {
        $this->fecha = $fecha;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado) : void
    {
        $this->estado = $estado;
    }
}