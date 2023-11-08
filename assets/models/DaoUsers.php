<?php

require_once "LibraryPDO.php";
require_once "classes/User.php";
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
   //Inserta una marca en la tabla
   public function insert($user)
   {
      $query= "INSERT INTO users VALUES (:username, :name, :surname, :password, :birthdate, :direction, :permissions)";
      $param = array();
      $param[":username"] = $user->__get("userName");
      $param[":name"] = $user->__get("name");
      $param[":surname"] = $user->__get("surName");
      $param[":password"] = $user->__get("password");
      $param[":birthdate"] = $user->__get("birthDate");
      $param[":direction"] = $user->__get("direction");
      $param[":permissions"] = $user->__get("permissions");
      var_dump($user->__get("birthDate"));
      $this->consultaSimple($query, $param);

   }

   public function list()
   {
      $consulta = "SELECT userName, name, surName, direction FROM users";
      $param = array();

      $this->consultaDatos($consulta, $param);
      
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
   public function buildUsersJson()
   {
      $json = json_encode("");

      header('Content-Type: application/json');
      $fileName = './test/day_' . date("d-m-Y_H-i-s", time()) . '.json';
      file_put_contents($fileName, $json);
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

   /**
    * Si es 1 es que ha encontrado datos, devuelve true, si no false
    * no puede haber mas de un username igual
    */
   public function login($userName, $password)
   {
      $query = 
      "SELECT * 
      FROM users 
      WHERE username = :username 
      AND password = :password 
      LIMIT 1";
      $param = array();
      $param[':username'] = $userName;
      $param[':password'] = $this->hashKey($password);
      $this->consultaDatos($query, $param);

      return count($this->filas) == 1;
   }
   public function permissions($username)
   {
      $query = 
      "SELECT permission_level
      FROM users 
      WHERE username = :username
      LIMIT 1";
      $param = array();
      $param[':username'] = $username;
      $this->consultaDatos($query, $param);
      return $this->filas[0]["permission_level"];
   }
   
   public function createUser($userName, $name, $surName, $password, $birthDate, $direction, $permissions)
   {
      return new User($userName, $name, $surName, $birthDate, $direction, $permissions, $this->hashKey($password));
   }
   private function hashKey($password)
   {
      return sha1($password);
   }
}
