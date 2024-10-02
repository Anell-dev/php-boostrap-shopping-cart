<?php
spl_autoload_register(function ($class_name) {
    include '../classes/' . $class_name . '.php';
});
session_start();
$carrito = new Carrito();

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    if (Product::deleteProduct($productId)) {
        $carrito->eliminarProducto($productId);
        header("Location: product.php?message=Producto eliminado exitosamente.");
        exit();
    } else {

        header("Location: product.php.php?message=Error al eliminar el producto.");
        exit();
    }
} else {
    header("Location: product.php?message=No se encontró el ID del producto.");
    exit();
}
