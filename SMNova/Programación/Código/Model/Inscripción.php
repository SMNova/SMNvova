<?php
class Inscripción {
    private $id_inscripcion;
    private $fecha_inscripcion;
    private $estado;
    private $puntos;
    private $jugados;
    private $ganados;
    private $empatados;
    private $perdidos;
    private $id_torneo;
    private $id_usuario;
    private $id_equipo;

    public function __construct($id_inscripcion = null, $fecha_inscripcion = null, $estado = 'Activa', $puntos = 0, $jugados = 0, $ganados = 0, $empatados = 0, $perdidos = 0, $id_torneo = null, $id_usuario = null, $id_equipo = null) {
        $this->id_inscripcion = $id_inscripcion;
        $this->fecha_inscripcion = $fecha_inscripcion;
        $this->estado = $estado;
        $this->puntos = $puntos;
        $this->jugados = $jugados;
        $this->ganados = $ganados;
        $this->empatados = $empatados;
        $this->perdidos = $perdidos;
        $this->id_torneo = $id_torneo;
        $this->id_usuario = $id_usuario;
        $this->id_equipo = $id_equipo;
    }
    //Getters y Setters
    public function getId_inscripcion()
    {
        return $this->id_inscripcion;
    }

    public function setId_inscripcion($id_inscripcion) : void
    {
        $this->id_inscripcion = $id_inscripcion;
    }

    public function getFecha_inscripcion()
    {
        return $this->fecha_inscripcion;
    }

    public function setFecha_inscripcion($fecha_inscripcion) : void
    {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado) : void
    {
        $this->estado = $estado;
    }

    public function getPuntos()
    {
        return $this->puntos;
    }

    public function setPuntos($puntos) : void
    {
        $this->puntos = $puntos;
    }

    public function getJugados()
    {
        return $this->jugados;
    }

    public function setJugados($jugados) : void
    {
        $this->jugados = $jugados;
    }

    public function getGanados()
    {
        return $this->ganados;
    }

    public function setGanados($ganados) : void
    {
        $this->ganados = $ganados;
    }

    public function getEmpatados()
    {
        return $this->empatados;
    }

    public function setEmpatados($empatados) : void
    {
        $this->empatados = $empatados;
    }

    public function getPerdidos()
    {
        return $this->perdidos;
    }

    public function setPerdidos($perdidos) : void
    {
        $this->perdidos = $perdidos;
    }

    public function getId_torneo()
    {
        return $this->id_torneo;
    }

    public function setId_torneo($id_torneo) : void
    {
        $this->id_torneo = $id_torneo;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) : void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId_equipo()
    {
        return $this->id_equipo;
    }

    public function setId_equipo($id_equipo) : void
    {
        $this->id_equipo = $id_equipo;
    }
}
?>