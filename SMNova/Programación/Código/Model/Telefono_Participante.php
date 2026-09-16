<?php

class Telefono_Participante {
    private $id_usuario;
    private $telefono;

    public function __construct($id_usuario = null, $telefono = null) {
        $this->id_usuario = $id_usuario;
        $this->telefono = $telefono;
    }
    
    //Getters y Setters
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) : void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono) : void
    {
        $this->telefono = $telefono;
    }
}
?>