<?php

class Auditoria {
    private $id_auditoria;
    private $accion;
    private $tabla_afectada;
    private $detalle;
    private $fecha_hora;
    private $id_usuario;

    public function __construct($id_auditoria = null, $accion = null, $tabla_afectada = null, $detalle = null, $fecha_hora = null, $id_usuario = null) {
        $this->id_auditoria = $id_auditoria;
        $this->accion = $accion;
        $this->tabla_afectada = $tabla_afectada;
        $this->detalle = $detalle;
        $this->fecha_hora = $fecha_hora;
        $this->id_usuario = $id_usuario;
    }
    // Getters y Setters
    public function getId_auditoria()
    {
        return $this->id_auditoria;
    }

    public function setId_auditoria($id_auditoria) : void
    {
        $this->id_auditoria = $id_auditoria;
    }

    public function getAccion()
    {
        return $this->accion;
    }

    public function setAccion($accion) : void
    {
        $this->accion = $accion;
    }

    public function getTabla_afectada()
    {
        return $this->tabla_afectada;
    }

    public function setTabla_afectada($tabla_afectada) : void
    {
        $this->tabla_afectada = $tabla_afectada;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function setDetalle($detalle) : void
    {
        $this->detalle = $detalle;
    }

    public function getFecha_hora()
    {
        return $this->fecha_hora;
    }

    public function setFecha_hora($fecha_hora) : void
    {
        $this->fecha_hora = $fecha_hora;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) : void
    {
        $this->id_usuario = $id_usuario;
    }
}
?>