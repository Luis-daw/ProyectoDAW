<?php
$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "proyecto-daw";

$productData = array();
try {

    $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname", $DBuser, $DBpass);
    $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM productos";

    $stmt = $DBcon->prepare($query);
    $stmt->execute();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        $product = array();
        // $userData['products'] = $row;
        foreach($row as $clave => $valor){
            $product["product"][$clave] = $valor;
            echo "Primer foreach clave: $clave, valor: $valor";
            // $productData['products'][]["product"][$clave] = $valor;
        }
        $productData['products'][] = $product;
    }
} catch (PDOException $ex) {

    die($ex->getMessage());
}
$object;
$data;
$json = json_encode($productData);

header('Content-Type: application/json');
$fileName = './test/day_' . date("d-m-Y_H-i-s", time()) . '.json';
file_put_contents($fileName, $json);

?>
<meta http-equiv="refresh" content="0; url=/index.html">