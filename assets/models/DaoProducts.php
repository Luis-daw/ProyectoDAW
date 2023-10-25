<?php

require_once("LibraryPDO.php");
require_once "classes/Usuario.php";
class DaoUsers extends DB
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
    public function toJson()
    {
        $products = list();

        // Convertir el array de productos a JSON
        $jsonData = json_encode(array_map(function ($product) {
            return $product->toArray();
        }, $products));

        echo $jsonData;
    }
    public function list($filterMessage = 1, $orderField = '', $orderType = 'DESC')
    {

        $query = "SELECT * FROM usuarios WHERE 1";

        $param = array();

        $param[''];
    }
    private function testFilterMessage($filterMessage)
    {
        $message = "";

        if ($filterMessage) {
        }
    }
    //Inserta una marca en la tabla
    public function insertUser($usuario)
    {
        $consulta = "INSERT INTO usuarios VALUES (:userName, :name, :surName, :password, :birthDate, :direction, :permissions)";

        $param = array();
        $param[":userName"] = $usuario->__get("userName");
        $param[":name"] = $usuario->__get("name");
        $param[":surName"] = $usuario->__get("surName");
        $param[":password"] = $usuario->__get("password");
        $param[":birthDate"] = $usuario->__get("birthDate");
        $param[":direction"] = $usuario->__get("direction");
        $param[":permissions"] = $usuario->__get("permissions");
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
            // $usuario = new Usuario($fila["Usuario"], $fila["Clave"],"","","","");
        } else {
            $usuario = null;
        }
        return $usuario;
    }

    //Carga el contenido de la tabla en marcas coches
    // public function listar()
    // {
    //     //Consulta
    //     $consulta = "SELECT * FROM usuarios";

    //     //Vaciamos los arrays.
    //     $param = array();
    //     $this->usuarios = array();
    //     $this->consultaDatos($consulta, $param);

    //     foreach ($this->filas as $fila) {
    //         $usuario = new Usuario($fila["Usuario"], $fila["Clave"],2,2,2,2);
    //         $this->usuarios[] = $usuario;
    //     }
    // }
    public function login($userName, $password)
    {
        $consulta = "SELECT * FROM usuarios WHERE Nombre = ";
        $param = array();
    }
    public function createUser($userName, $name, $surName, $password, $birthDate, $direction, $permissions)
    {
        return new User($userName, $name, $surName, $this->hashKey($password), $birthDate, $direction, $permissions);
    }
    private function hashKey($password)
    {
        return sha1($password);
    }
}
