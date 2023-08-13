<?php 

class Usuario{

    private $nombreUsuario;
    private $nombre;
    private $apellidos;
    private $clave;
    private $fechaNacimiento;
    private $direccion;

    public function __construct($nombreUsuario, $nombre,$apellidos ,$clave ,$fechaNacimiento ,$direccion )
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->clave = $clave;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->direccion = $direccion;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
?>