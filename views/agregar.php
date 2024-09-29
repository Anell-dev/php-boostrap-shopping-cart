<?php 
session_start(); 
require("../classes/Product.php");

if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["stock"])) {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
  
    $product = new Product($name, $price, $stock);
    
    // Inicializar la sesión de productos si no existe
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = [];
    }

    // Agregar el producto a la sesión
    $_SESSION['products'][] = $product; 

    // Redirigir al listado de productos
    header("Location: product.php"); 
    exit(); 
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Agregar Producto</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">  
    <link rel="stylesheet" href="../assets/css/navbar.css"> 
</head>
<body> 
    <?php require("../includes/navbar.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h1>Agregar Producto</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center">
                <img src="../assets/img/Sale.png" class="img-fluid" alt="Imagen del producto">
            </div>
        </div>
    </div>  

<!-- Agregarme los footers------------------------------------------------------------- -->

    <script src="../assets/js/navbar.js"></script>  
</body>
</html>
