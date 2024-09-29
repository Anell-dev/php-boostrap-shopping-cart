<?php
// Autoloader
spl_autoload_register(function ($class_name) {
    include '../classes/' . $class_name . '.php';
});
session_start();
$products = Product::getAllProducts();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productIndex = $_POST['productIndex'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock']; 

    if (isset($products[$productIndex])) {

        $productId = $products[$productIndex]->getId();
        $success = Product::updateProducts($productId, $name, $price, $stock);

        if ($success) {
            header('Location: product.php'); // Cambia esto a la página donde quieres redirigir
            exit();
        } else {
            echo "Error al actualizar el producto.";
        }
    } else {
        echo "Índice de producto no válido.";
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <title>Listado de Productos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/navbar.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">  
</head>
<body>
    <?php require("../includes/navbar.php"); ?>
    <h1 class="text-center mt-4">Listado de Productos</h1>
    <div class="container mt-4">
        <div class="row">
            <?php if (count($products) > 0): ?>
                <?php foreach (array_keys($products) as $index): ?>
                    <?php $product = $products[$index]; ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <img src="../assets/img/Sale.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product->getName()); ?></h5>
                                <p class="card-text">Precio: $<?php echo htmlspecialchars($product->getPrice()); ?></p>
                                <p class="card-text">Stock: <?php echo htmlspecialchars($product->getStock()); ?> unidades</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <!-- Botón para agregar al carrito -->
                                    <form action="" method="POST" class="me-2">
                                        <input type="hidden" name="productId" value="<?php echo $product->getId(); ?>" />
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-cart-plus"></i> Carrito 
                                        </button>
                                    </form>

                                    <!-- Botón para editar -->
                                    <form class="me-2">
                                        <input type="hidden" name="productIndex" value="<?php echo $index; ?>" />
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal" onclick="openEditModal(<?php echo $index; ?>, '<?php echo htmlspecialchars($product->getName()); ?>', <?php echo htmlspecialchars($product->getPrice()); ?>, <?php echo htmlspecialchars($product->getStock()); ?>)">
                                            <i class="bi bi-pencil-square"></i> 
                                        </button>
                                    </form>

                                    <!-- Modal de Edición -->
                                    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editProductForm" method="POST" action="">
                                                        <input type="hidden" name="productIndex" id="productIndex">
                                                        <div class="mb-3">
                                                            <label for="productName" class="form-label">Nombre del Producto</label>
                                                            <input type="text" class="form-control" id="productName" name="name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="productPrice" class="form-label">Precio</label>
                                                            <input type="number" class="form-control" id="productPrice" name="price" step="0.01" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="productStock" class="form-label">Stock</label>
                                                            <input type="number" class="form-control" id="productStock" name="stock" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                      <!-- Botón para eliminar -->
                                <form action="../views/eliminar.php" method="POST" style="display:inline;">
                                      <input type="hidden" name="productId" value="<?php echo $product->getId(); ?>" />
                                      <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i> 
                                      </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No hay productos disponibles.</p>
                </div>
            <?php endif; ?>
        </div>
    </div> 

<!-- Agregarme los footers------------------------------------------------------------- -->

    <script src="../assets/js/product.js"></script>            
    <script src="../assets/js/navbar.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
