<?php

require_once("LibraryPDO.php");
require_once("classes/Product.php");
class DaoProducts extends DB
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
      $products = $this->list();
      $products = $this->getProductCategories($products);
      foreach ($products as $product) {
         $productData = [
            "id" => $product->id,
            "name" => $product->name,
            "provider" => $product->provider,
            "price" => $product->price,
            "image" => $product->image
         ];
         //Creamos el array de las categorias
         $categories = $product->categories;

         // Creamos el array principal con los datos
         $data[] = [
            'product' => $productData,
            'categories' => $categories
         ];
      }

      // Convertir el arreglo principal en formato JSON
      $json = json_encode($data);

      // Guardar el JSON en un archivo (por ejemplo, 'productos.json')
      $host = $_SERVER['HTTP_HOST'];
      $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
      $base_url = $protocol . $host;

      // Ruta al archivo JSON de productos
      $productos_json_url = $base_url . '/proyectodaw/data/products.json';
      $productos_json_url = "../data/products.json";
      file_put_contents($productos_json_url, $json);
   }
   public function getProductCategories($products)
   {
      foreach ($products as $key => $value) {
         $query = "SELECT *
            FROM products p
            INNER JOIN product_category pc ON p.id = pc.id_product
            INNER JOIN categories c ON pc.id_category = c.id
            WHERE p.id = :id
            ;
            ";
         $param = array();
         $param[":id"] = $value->id;

         $this->consultaDatos($query, $param);
         $categories = array();
         foreach ($this->filas as $fila) {
            $categories[] = $fila['id'];
         }
         $value->addCategories($categories);
      }
      return $products;
   }
   public function addProduct($product)
   {
      $query = "INSERT INTO products (name, provider, price, image) VALUES (:name, :provider, :price, :image)";

      $param = array(
         ':name' => $product->name,
         ':provider' => $product->provider,
         ':price' => $product->price,
         ':image' => $product->image
      );
      // $param = array();
      // $param[':name'] =  $name;
      // $param[':provider'] =  $provider;
      // $param[':price'] =  $price;
      // $param[':image'] =  $image;
      $this->consultaSimple($query, $param);
      var_dump($query);
      var_dump($param);
   }
   public function getCategories()
   {
      $query = "SELECT * FROM categories";
      $param = array();
      $this->consultaDatos($query, $param);

      if (count($this->filas) > 0) {
         $categories = array();
         foreach ($this->filas as $fila) {
            $categories[$fila['id']] = $fila['name'];
         }
      } else {
         // No se encontraron resultados
         echo "No se encontraron productos en la base de datos.";
      }
      return $categories;
   }
   public function list($filter = null)
   {

      $query = "SELECT * FROM products WHERE 1";
      if ($filter !== null) {
         $query .= " " . $filter;
      }
      $param = array();

      $this->consultaDatos($query, $param);

      if (count($this->filas) > 0) {
         $products = array();
         foreach ($this->filas as $fila) {
            $product = new Product(
               $fila['id'],
               $fila['name'],
               $fila['provider'],
               $fila['price'],
               $fila['image']
            );
            $products[] = $product;
         }
      } else {
         // No se encontraron resultados
         echo "No se encontraron productos en la base de datos.";
      }

      return $products;
   }
   public function createProduct($name, $username, $price, $image = null)
   {
      return new Product(null, $name, $username, $price, $image);
   }
}
