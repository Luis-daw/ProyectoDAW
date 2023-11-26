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
   public function addProduct($product, $status, $categories = null)
   {
      echo "<br>";
      $query = "INSERT INTO products (name, provider, price, image, status, description) VALUES (:name, :provider, :price, :image, :status, :description)";

      $param = array(
         ':name' => $product->name,
         ':provider' => $product->provider,
         ':price' => $product->price,
         ':image' => $product->image,
         ':status' => $status,
         ':description' => $product->description
      );
      $this->consultaSimple($query, $param);
   }
   public function getProductId($name, $price)
   {
      $query = "SELECT id FROM products WHERE name=:name AND price=:price LIMIT 1";
      $param = array(
         ':name' => $name,
         ':price' => $price
      );
      $this->consultaDatos($query, $param);
      var_dump($this->filas);
      if (!empty($this->filas) && isset($this->filas[0]['id'])) {
         // Devolver el ID si hay resultados
         return $this->filas[0]['id'];
      } else {
         // Devolver algo que indique que no se encontró ningún resultado
         return null;
      }
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
   public function list($filter = "enabled")
   {

      $query = "SELECT * FROM products WHERE 1";
      $param = array();
      if ($filter !== null) {
         $query .= " AND status =:status";
         $param['status'] = $filter;
      }

      $this->consultaDatos($query, $param);

      if (count($this->filas) > 0) {
         $products = array();
         foreach ($this->filas as $fila) {
            $product = new Product(
               $fila['id'],
               $fila['name'],
               $fila['provider'],
               $fila['price'],
               $fila['image'],
               $fila['description']
            );
            $products[] = $product;
         }
      } else {
         // No se encontraron resultados
         echo "No se encontraron productos en la base de datos.";
      }

      return $products;
   }
   public function getProductName($name)
   {
      $query = "SELECT * FROM products WHERE name =:name";
      $param = array();
      $param[':name'] = $name;

      $this->consultaDatos($query, $param);

      if (count($this->filas) > 0) {
         $products = array();
         foreach ($this->filas as $fila) {
            $product = new Product(
               $fila['id'],
               $fila['name'],
               $fila['provider'],
               $fila['price'],
               $fila['image'],
               $fila['description']
            );
            $products[] = $product;
         }
      } else {
         // No se encontraron resultados
         echo "No se encontraron productos en la base de datos.";
      }
      return reset($products);
   }
   public function getProductProvider($id)
   {
      $query = "SELECT * FROM products WHERE id=:id LIMIT 1";
      $param = array(
         ':id' => $id,
      );
      $this->consultaDatos($query, $param);
      if (!empty($this->filas) && isset($this->filas[0]['id'])) {
         return $this->filas[0]['provider'];
      } else {
         return null;
      }
   }
   public function insertCategoriesProduct($categories, $id)
   {
      $query = "INSERT INTO product_category (id_product, id_category) VALUES (:id, :category)";
      $param = array();
      $param['id'] = $id;
      var_dump($query);
      foreach ($categories as $category) {
         $param[':category'] = $category;
         $this->consultaSimple($query, $param);
      }
   }
   public function changeProductStatus($id, $status){
      $query = "UPDATE products SET status = :status WHERE id = :id";
      $param = array();
      $param[':id'] = $id;
      $param[':status'] = $status;
      $this->consultaSimple($query,$param);
   }
   public function eliminateProduct($id){
      $query = "DELETE FROM products WHERE id=:id";
      $param = array();
      $param[':id'] = $id;
      $this->consultaSimple($query,$param);
   }
   public function buyProduct($productId, $nameBuyer){
      $productProvider = $this->getProductProvider($productId);
      $query = "INSERT INTO orders (provider,buyer, product) VALUES (:provider, :buyer, :product)";
      $param = array(
         ':provider' => $productProvider,
         ':buyer' => $nameBuyer,
         ':product' => $productId
      );
      var_dump($param);
      $this->consultaSimple($query, $param);
   }
   public function getUsersProducts($buyer){
      $query = "SELECT products.name, products.price, products.image
      FROM orders
      JOIN products ON orders.product = products.id
      WHERE orders.buyer = :buyer";
      $param = array(
         ':buyer' => $buyer
      );
      $this->consultaDatos($query, $param);
      return $this->filas;
   }
   public function createProduct($name, $username, $price, $image, $description)
   {
      echo "<br> nombre $name";
      return new Product(null, $name, $username, $price, $image, $description);
   }
}
