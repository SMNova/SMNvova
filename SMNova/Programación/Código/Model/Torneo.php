<?php

class Torneo {
    private $id_torneo;
    private $nombre;
    private $fecha_inicio;
    private $fecha_fin;
    private $estado;
    private $visibilidad;
    private $max_participantes;
    private $permite_empates;
    private $id_tipo_torneo;
    private $id_organizador;

    public function __construct($id_torneo = null, $nombre = null, $fecha_inicio = null, $fecha_fin = null, $estado = null, $visibilidad = 'Publico', $max_participantes = null, $permite_empates = false, $id_tipo_torneo = null, $id_organizador = null) {
        $this->id_torneo = $id_torneo;
        $this->nombre = $nombre;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->estado = $estado;
        $this->visibilidad = $visibilidad;
        $this->max_participantes = $max_participantes;
        $this->permite_empates = $permite_empates;
        $this->id_tipo_torneo = $id_tipo_torneo;
        $this->id_organizador = $id_organizador;
    }

    public function getId_torneo()
    {
        return $this->id_torneo;
    }

    public function setId_torneo($id_torneo) : void
    {
        $this->id_torneo = $id_torneo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre) : void
    {
        $this->nombre = $nombre;
    }

    public function getFecha_inicio()
    {
        return $this->fecha_inicio;
    }

    public function setFecha_inicio($fecha_inicio) : void
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFecha_fin()
    {
        return $this->fecha_fin;
    }

    public function setFecha_fin($fecha_fin) : void
    {
        $this->fecha_fin = $fecha_fin;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado) : void
    {
        $this->estado = $estado;
    }

    public function getVisibilidad()
    {
        return $this->visibilidad;
    }

    public function setVisibilidad($visibilidad) : void
    {
        $this->visibilidad = $visibilidad;
    }

    public function getMax_participantes()
    {
        return $this->max_participantes;
    }

    public function setMax_participantes($max_participantes) : void
    {
        $this->max_participantes = $max_participantes;
    }

    public function getPermite_empates()
    {
        return $this->permite_empates;
    }


    public function setPermite_empates($permite_empates) : void
    {
        $this->permite_empates = $permite_empates;
    }

    public function getId_tipo_torneo()
    {
        return $this->id_tipo_torneo;
    }

    public function setId_tipo_torneo($id_tipo_torneo) : void
    {
        $this->id_tipo_torneo = $id_tipo_torneo;
    }

    public function getId_organizador()
    {
        return $this->id_organizador;
    }

    public function setId_organizador($id_organizador) : void
    {
        $this->id_organizador = $id_organizador;
    }
}
?>