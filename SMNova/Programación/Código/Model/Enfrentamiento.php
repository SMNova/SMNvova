<?php

class Enfrentamiento {
    private $id_enfrentamiento;
    private $id_ronda;
    private $numero_enfrentamiento;
    private $fecha_hora;
    private $estado;
    private $puntaje_a;
    private $puntaje_b;
    private $id_ganador;
    private $validado;

    public function __construct($id_enfrentamiento = null, $id_ronda = null, $numero_enfrentamiento = null, $fecha_hora = null, $estado = 'Pendiente', $puntaje_a = null, $puntaje_b = null, $id_ganador = null, $validado = false) {
        $this->id_enfrentamiento = $id_enfrentamiento;
        $this->id_ronda = $id_ronda;
        $this->numero_enfrentamiento = $numero_enfrentamiento;
        $this->fecha_hora = $fecha_hora;
        $this->estado = $estado;
        $this->puntaje_a = $puntaje_a;
        $this->puntaje_b = $puntaje_b;
        $this->id_ganador = $id_ganador;
        $this->validado = $validado;
    }

    // Getters and Setters
    
    public function getId_enfrentamiento()
    {
        return $this->id_enfrentamiento;
    }

    public function setId_enfrentamiento($id_enfrentamiento) : void
    {
        $this->id_enfrentamiento = $id_enfrentamiento;
    }

    public function getId_ronda()
    {
        return $this->id_ronda;
    }

    public function setId_ronda($id_ronda) : void
    {
        $this->id_ronda = $id_ronda;
    }

    public function getNumero_enfrentamiento()
    {
        return $this->numero_enfrentamiento;
    }

    public function setNumero_enfrentamiento($numero_enfrentamiento) : void
    {
        $this->numero_enfrentamiento = $numero_enfrentamiento;
    }

    public function getFecha_hora()
    {
        return $this->fecha_hora;
    }

    public function setFecha_hora($fecha_hora) : void
    {
        $this->fecha_hora = $fecha_hora;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado) : void
    {
        $this->estado = $estado;
    }

    public function getPuntaje_a()
    {
        return $this->puntaje_a;
    }

    public function setPuntaje_a($puntaje_a) : void
    {
        $this->puntaje_a = $puntaje_a;
    }

    public function getPuntaje_b()
    {
        return $this->puntaje_b;
    }

    public function setPuntaje_b($puntaje_b) : void
    {
        $this->puntaje_b = $puntaje_b;
    }

    public function getId_ganador()
    {
        return $this->id_ganador;
    }

    public function setId_ganador($id_ganador) : void
    {
        $this->id_ganador = $id_ganador;
    }

    public function getValidado()
    {
        return $this->validado;
    }

    public function setValidado($validado) : void
    {
        $this->validado = $validado;
    }
}