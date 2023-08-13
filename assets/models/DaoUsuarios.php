<?php

require_once("LibraryPDO.php");
require_once "classes/Usuario.php";
class DaoUsuarios extends DB
{

    //Array de objetos tipo marcascoches
    public $usuarios = array();

    /**
     * Recibe la BBDD al crear el DAO
     */
    public function __construct($dbname)
    {
        $this->dbname = $dbname;
    }

    //Inserta una marca en la tabla
    public function insertar($usuario)
    {
        $consulta = "INSERT INTO usuarios VALUES (:Usuario, :Clave)";

        $param = array();
        $param[":Usuario"] = $usuario->__get("usuario");
        $param[":Clave"] = $usuario->__get("clave");
        $this->consultaSimple($consulta, $param);
    }

    public function actualizar($usuario)
    {
        $consulta = "UPDATE usuarios SET Clave=:Clave WHERE Usuario=:Usuario";
        $param = array();

        $param[":Usuario"] = $usuario->__get("usuario");
        $param[":Clave"] = $usuario->__get("clave");

        $this->consultaSimple($consulta, $param);
    }

    public function eliminar($nombreUsuario = "")
    {

        $consulta = "DELETE FROM usuarios WHERE Usuario=:Usuario";

        $param = array();
        $param[":Usuario"] = $nombreUsuario;

        $this->consultaSimple($consulta, $param);
    }

    // //Devuelve una marca a partir de su id.
    public function obtener($usuario = "")
    {
        $consulta = "SELECT * FROM usuarios WHERE Usuario=:Usuario";

        $param = array();
        $param[":Usuario"] = $usuario;

        $this->consultaDatos($consulta, $param);

        if (count($this->filas) == 1) {
            $fila = $this->filas[0];
            $usuario = new Usuario($fila["Usuario"], $fila["Clave"],"","","","");
        }
        else{
            $usuario = null;
        }
        return $usuario;
    }

    //Carga el contenido de la tabla en marcas coches
    public function listar()
    {
        //Consulta
        $consulta = "SELECT * FROM usuarios";

        //Vaciamos los arrays.
        $param = array();
        $this->usuarios = array();
        $this->consultaDatos($consulta, $param);

        foreach ($this->filas as $fila) {
            $usuario = new Usuario($fila["Usuario"], $fila["Clave"],2,2,2,2);
            $this->usuarios[] = $usuario;
        }

        //Otra manera de hacerlo.
        // 
        // foreach ($this->filas as $fila) {
        //    $marca = new marcaCoche();
        //    $marca->__set("Id",$fila["Id"]);
        //    $marca->__set("Nombre",$fila["Nombre"]);
        //    $marca->__set("Logo",$fila["Logo"]);
        //    $this->marcasCoches[] = $marca;
        // }
    }
}
