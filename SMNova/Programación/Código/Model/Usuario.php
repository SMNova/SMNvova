<?php
class Usuario
{
    // el signo (?) significa que el valor puede ser el dato especificado o nulo ()
    private ?int $user_id;
    private int $id_rol;
    private String $email;
    private String $password_hash;
    private String $nombre;
    private String $apellido;
    private Boolean $estado;
    private int $torneos_participados;
    private int $torneos_ganados;
    private int $mvp;
    private String $fecha_registro;
    function __construct(?int $user_id, int $id_rol, String $email, String $password_hash, String $nombre, String $apellido){
        $this->user_id=$user_id;
        $this->id_rol=$id_rol;
        $this->email=$email;
        $this->password_hash=$password_hash;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->torneos_participados=0;
        $this->torneos_ganados=0;
        $this->mvp=0;
        $this->fecha_registro=date("Y-m-d H:i:s");
    }

    //Getters y Setters

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getId_rol()
    {
        return $this->id_rol;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword_hash()
    {
        return $this->password_hash;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getTorneos_participados()
    {
        return $this->torneos_participados;
    }

    public function getTorneos_ganados()
    {
        return $this->torneos_ganados;
    }

    public function getMvp()
    {
        return $this->mvp;
    }

    public function getFecha_registro()
    {
        return $this->fecha_registro;
    }

    public function setUser_id($user_id) : void
    {
        $this->user_id = $user_id;
    }

    public function setId_rol($id_rol) : void
    {
        $this->id_rol = $id_rol;
    }

    public function setEmail($email) : void
    {
        $this->email = $email;
    }

    public function setPassword_hash($password_hash) : void
    {
        $this->password_hash = $password_hash;
    }

    public function setNombre($nombre) : void
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) : void
    {
        $this->apellido = $apellido;
    }

    public function setEstado($estado) : void
    {
        $this->estado = $estado;
    }

    public function setTorneos_participados($torneos_participados) : void
    {
        $this->torneos_participados = $torneos_participados;
    }

    public function setTorneos_ganados($torneos_ganados) : void
    {
        $this->torneos_ganados = $torneos_ganados;
    }

    public function setMvp($mvp) : void
    {
        $this->mvp = $mvp;
    }

    public function setFecha_registro($fecha_registro) : void
    {
        $this->fecha_registro = $fecha_registro;
    }
}
?>