<?php

class Tipo_Torneo {
    private $id_tipo_torneo;
    private $nombre;
    private $descripcion;

    public function __construct($id_tipo_torneo = null, $nombre = null, $descripcion = null) {
        $this->id_tipo_torneo = $id_tipo_torneo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    // Getters y Setters
    public function getId_tipo_torneo()
    {
        return $this->id_tipo_torneo;
    }

    public function setId_tipo_torneo($id_tipo_torneo) : void
    {
        $this->id_tipo_torneo = $id_tipo_torneo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre) : void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) : void
    {
        $this->descripcion = $descripcion;
    }
}
?>