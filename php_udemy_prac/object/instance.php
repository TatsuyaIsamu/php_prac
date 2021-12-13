<?php 
  class Product {
    private $product = [];

    public function __construct($product) {
      $this->product = $product;
    }

    public function getProduct() {
      echo $this->product;
    }

    public function addProduct($item) {
      $this->product .= $item;
    }

    public static function getStaticProduct($str) {
      echo $str;
    }

  }

  $instance = new Product('てすと');

  var_dump($instance);

  echo '<br>';
  $instance->getProduct();
  echo '<br>';

  $instance->addProduct('追加文');

  $instance->getProduct();
  echo '<br>';

  Product::getStaticProduct('静的');
  echo '<br>';
?>