<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
</head>

<body>
    <?php

    //Clase que mediante PDO y orientación a objetos accedemos a las BBDD
    class DB
    {
        private $connect; //Propiedad que retorna el PDO resultante de la conexion.

        private $host = "localhost";

        protected $dbname = "proyecto-daw";

        private $user = "root";

        private $pass = "";

        public $filas = array();

        public function __construct($bbdd)
        {
            $this->dbname = $bbdd;
        }
        private function conectar()
        {
            try {
                $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            } catch (PDOException $e) {
                echo "Error al conectar con la BBDD";
                echo $e->getMessage();
            }
            //Asignamos el pdo a connect
            $this->connect=$pdo;
        }
        private function cerrar(){
            $this->connect = null;
        }
        public function consultaSimple($consulta, $param){
            $this->conectar();

            $sta = $this->connect->prepare($consulta);

            if(!($sta->execute($param))){
                echo "Error en la consulta";
            }

            $this->cerrar();
        }
        public function consultaDatos($consulta, $param){
            $this->conectar();

            //Vaciamos el array de filas para no acumular las consultas.
            $this->filas = array();

            $sta = $this->connect->prepare($consulta);

            if($sta->execute($param)){
                while($fila = $sta->fetch(PDO::FETCH_ASSOC)){
                    //Añadimos las filas al array.
                    $this->filas[] = $fila;
                }
            }
            else{
                echo "Error en la consulta";
            }

            $this->cerrar();
        }
    }

    ?>
</body>

</html>