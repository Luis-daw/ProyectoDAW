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

   //Insertamos un usuario
   public function insert($user)
   {
      $query = "INSERT INTO users VALUES (:username, :name, :surname, :password, :birthdate, :direction, :permissions)";
      $param = array();
      $param[":username"] = $user->__get("userName");
      $param[":name"] = $user->__get("name");
      $param[":surname"] = $user->__get("surName");
      $param[":password"] = $user->__get("password");
      $param[":birthdate"] = $user->__get("birthDate");
      $param[":direction"] = $user->__get("direction");
      $param[":permissions"] = $user->__get("permissions");
      $this->consultaSimple($query, $param);
   }

   //Eliminamos un usuario
   public function eliminateUser($user)
   {
      $query = "DELETE FROM users WHERE username = :username";
      $param = array();
      $param[':username'] = $user;
      $this->consultaSimple($query,$param);
   }

   //Listamos los usuarios
   public function list()
   {
      $consulta = "SELECT userName, name, surName, direction FROM users";
      $param = array();

      $this->consultaDatos($consulta, $param);
   }

   //Actualizamos los permisos de un usuario
   public function update($username, $permission)
   {
      $query = "UPDATE users
      SET permission_level = :permission
      WHERE username = :username";
      $param = array();
      $param[':permission'] = $permission;
      $param[':username'] = $username;
      $this->consultaSimple($query, $param);
   }

   //Recogemos los usuarios con menor permisos que los pasados por parametro
   public function getUsersPermissions($permissionsLevel, $username = false)
   {
      $query = "SELECT users.username, permissions.permission_level, permissions.permission_name 
      FROM users 
      LEFT JOIN permissions ON users.permission_level = permissions.permission_level 
      WHERE permissions.permission_level < :permissions";
      $param = array();
      if ($username) {
         $query .= " AND username LIKE :username";
         $param[':username'] = "%" . $username . "%";
      }
      $param[':permissions'] = $permissionsLevel;
      $this->consultaDatos($query, $param);

      return $this->filas;
   }

   //Eliminamos un usuario
   public function eliminar($nombreUsuario = "")
   {

      $consulta = "DELETE FROM usuarios WHERE Usuario=:Usuario";

      $param = array();
      $param[":Usuario"] = $nombreUsuario;

      $this->consultaSimple($consulta, $param);
   }

   //Hacemos login
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

   //Recogemos los permisos de un usuario
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

   //Creamos un usuario
   public function createUser($userName, $name, $surName, $password, $birthDate, $direction, $permissions)
   {
      return new User($userName, $name, $surName, $birthDate, $direction, $permissions, $this->hashKey($password));
   }
   //Funcion para cifrar la contraseña.
   private function hashKey($password)
   {
      return sha1($password);
   }
}
