<?php
session_start();
require_once './classes/Carrito.php'; // Asegúrate de que la ruta de la clase Carrito sea correcta

// Crear una instancia del carrito
$carrito = new Carrito();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $precio = (float)$_POST['precio'];
  $cantidad = (int)$_POST['cantidad'];

  // Generar un ID único para el producto
  $id = uniqid();

  // Agregar el producto al carrito
  $carrito->agregarProducto($id, $nombre, $precio, $cantidad);

  echo "Producto agregado al carrito!<br>";
}
print_r($_SESSION['carrito']);
// var_dump($_SESSION['carrito']);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Producto al Carrito</title>
</head>

<body>

  <h1>Agregar Libro</h1>

  <form action="" method="post">
    <label for="">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="">Precio</label>
    <input type="number" step="0.01" name="precio" required>

    <label for="">Cantidad</label>
    <input type="number" name="cantidad" required>

    <button type="submit">Agregar producto al carrito</button>
    <button type="submit">Vaciar carrito</button>
  </form>

</body>

</html>