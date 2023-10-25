<?php

class Product{
    private $id;
    private $name;
    private $provider;
    private $price;

    public function __construct($id, $name, $provider, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->provider = $provider;
        $this->price = $price;
    }
}

?>