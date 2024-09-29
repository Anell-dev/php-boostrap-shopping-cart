<?php 
spl_autoload_register(function ($class_name) {
    include '../classes/' . $class_name . '.php';
});
session_start(); 

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    if (Product::deleteProduct($productId)) {
        // Redirecciona a la página de listado de productos con un mensaje de éxito
        header("Location: product.php?message=Producto eliminado exitosamente.");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        // Redirecciona a la página de listado de productos con un mensaje de error
        header("Location: product.php.php?message=Error al eliminar el producto.");
        exit();
    }
} else {
    // Si no se envió un productId, redirige con un mensaje de error
    header("Location: product.php?message=No se encontró el ID del producto.");
    exit();
}
?>