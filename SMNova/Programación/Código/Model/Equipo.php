<?php

class Equipo {
    private $id_equipo;
    private $nombre;
    private $logo_url;
    private $fecha_creacion;
    private $torneos_participados;
    private $victorias;

    public function __construct($id_equipo = null, $nombre = null, $logo_url = null, $fecha_creacion = null, $torneos_participados = 0, $victorias = 0) {
        $this->id_equipo = $id_equipo;
        $this->nombre = $nombre;
        $this->logo_url = $logo_url;
        $this->fecha_creacion = $fecha_creacion;
        $this->torneos_participados = $torneos_participados;
        $this->victorias = $victorias;
    }

    //Getters y Setters

    public function getId_equipo()
    {
        return $this->id_equipo;
    }


    public function setId_equipo($id_equipo) : void
    {
        $this->id_equipo = $id_equipo;
    }

   
    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre) : void
    {
        $this->nombre = $nombre;
    }

 
    public function getLogo_url()
    {
        return $this->logo_url;
    }


    public function setLogo_url($logo_url) : void
    {
        $this->logo_url = $logo_url;
    }

    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }


    public function setFecha_creacion($fecha_creacion) : void
    {
        $this->fecha_creacion = $fecha_creacion;
    }

  
    public function getTorneos_participados()
    {
        return $this->torneos_participados;
    }


    public function setTorneos_participados($torneos_participados) : void
    {
        $this->torneos_participados = $torneos_participados;
    }


    public function getVictorias()
    {
        return $this->victorias;
    }

    public function setVictorias($victorias) : void
    {
        $this->victorias = $victorias;
    }
}
?>