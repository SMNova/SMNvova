<?php

class Rol {
    private $id_rol;
    private $nombre;
    private $descripcion;

    public function __construct($id_rol = null, $nombre = null, $descripcion = null) {
        $this->id_rol = $id_rol;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;

    }
    // Getters and Setters
    
    public function getId_rol()
    {
        return $this->id_rol;
    }

    public function setId_rol($id_rol) : void
    {
        $this->id_rol = $id_rol;
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