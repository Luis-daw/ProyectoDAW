<?php 

class User{

    private $userName;
    private $name;
    private $surName;
    private $password;
    private $birthDate;
    private $direction;
    private $permissions;
    public function __construct($userName, $name, $surName, $birthDate, $direction, $permissions, $password)
    {
        $this->userName = $userName;
        $this->name = $name;
        $this->surName = $surName;
        $this->password = $password;
        $this->birthDate = $birthDate;
        $this->direction = $direction;
        $this->permissions = $permissions;
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