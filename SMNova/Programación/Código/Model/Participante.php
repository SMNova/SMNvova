<?php

class Participante {
    private $id_usuario;
    private $alias;
    private $fecha_nacimiento;

    public function __construct($id_usuario = null, $alias = null, $fecha_nacimiento = null) {
        $this->id_usuario = $id_usuario;
        $this->alias = $alias;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    
    // Getters y Setters 
    
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) : void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias) : void
    {
        $this->alias = $alias;
    }

    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento($fecha_nacimiento) : void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
}
?>