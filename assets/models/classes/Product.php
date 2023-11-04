<?php

class Product{
    private $id;
    private $name;
    private $provider;
    private $price;
    private $image;
    private $categories = array();

    public function __construct($id, $name, $provider, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->provider = $provider;
        $this->price = $price;
    }
    public function __get($attribute) {
        if (property_exists($this, $attribute)) {
            return $this->$attribute;
        }
    }

    // Método mágico para establecer el valor de un atributo
    public function __set($attribute, $value) {
        if (property_exists($this, $attribute)) {
            $this->$attribute = $value;
        }
    }
    public function addCategories($categories) {
        foreach ($categories as $key => $value) {
            $this->categories[$key] = $value;
        }
    }
}

?>