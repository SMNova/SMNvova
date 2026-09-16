<?php

class Compite {
    private $id_inscripcion;
    private $id_enfrentamiento;
    private $rol_competidor;

    public function __construct($id_inscripcion = null, $id_enfrentamiento = null, $rol_competidor = null) {
        $this->id_inscripcion = $id_inscripcion;
        $this->id_enfrentamiento = $id_enfrentamiento;
        $this->rol_competidor = $rol_competidor;
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

    public function getId_enfrentamiento()
    {
        return $this->id_enfrentamiento;
    }

    public function setId_enfrentamiento($id_enfrentamiento) : void
    {
        $this->id_enfrentamiento = $id_enfrentamiento;
    }

    public function getRol_competidor()
    {
        return $this->rol_competidor;
    }

    public function setRol_competidor($rol_competidor) : void
    {
        $this->rol_competidor = $rol_competidor;
    }
}
?>