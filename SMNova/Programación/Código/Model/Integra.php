<?php

class Integra {
    private $id_equipo;
    private $id_usuario;
    private $fecha_ingreso;

    public function __construct($id_equipo = null, $id_usuario = null, $fecha_ingreso = null) {
        $this->id_equipo = $id_equipo;
        $this->id_usuario = $id_usuario;
        $this->fecha_ingreso = $fecha_ingreso;
    }

    // Getters y Setters
    public function getId_equipo()
    {
        return $this->id_equipo;
    }

    public function setId_equipo($id_equipo) : void
    {
        $this->id_equipo = $id_equipo;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) : void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getFecha_ingreso()
    {
        return $this->fecha_ingreso;
    }

    public function setFecha_ingreso($fecha_ingreso) : void
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }
}

?>