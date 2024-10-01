<?php
spl_autoload_register(function ($class_name) {
  include '../classes/' . $class_name . '.php';
});

session_start();

// require('../classes/Product.php');
require('../classes/Carrito.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  if (isset($_POST["productId"])) {
    $productId = $_POST["productId"];

    $products = Product::getAllProducts();
    $product = array_filter($products, fn($p) => $p->getId() == $productId);

    if ($product) {
      $product = reset($product);

      $carrito = new Carrito();

      if ($carrito->agregarProducto($product->getId(), $product->getName(), $product->getPrice(), 1)['respuesta'] == 'ok') {
        header('location:product.php?msg=Producto agregado al carrito');
      } else {
        echo "Error al agregar el producto al carrito.";
      }
    } else {
      echo "Producto no encontrado.";
    }
  } else {
    echo "ID de producto no proporcionado.";
  }
}
