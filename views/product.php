<?php

require("../classes/Product.php");
session_start();

$products = Product::getAllProducts();

// Actualizar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
            header('Location: product.php');
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
<html lang="es">

<head>
    <title>E-Commerce | Shopping</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <?php require("../header.php"); ?>
    <?php require("../includes/navbar.php"); ?>
    <h1 class="text-center mt-4">E-Commerce | Shopping Store</h1>
    <div class="container mt-4" style="background: #FAFAFA;  height: 60%; align-content: center;">
        <div class="row" style="background: #FAFAFA;">
            <?php if (count($products) > 0): ?>
                <?php foreach (array_keys($products) as $index): ?>
                    <?php $product = $products[$index]; ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <img src="../assets/img/Sale.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product->getName()); ?></h5>
                                <p class="card-text">Price: $<?php echo htmlspecialchars($product->getPrice()); ?></p>
                                <p class="card-text">Stock: <?php echo htmlspecialchars($product->getStock()); ?> units</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <!-- Botón para agregar al carrito -->
                                    <form action="agregar_al_carrito.php" method="POST" class="me-2">
                                        <input type="hidden" name="productId" value="<?php echo $product->getId(); ?>" />
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-cart-plus"></i> Cart
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
                    <h4 class="text-center">No products available</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php require("../includes/footer.php"); ?>

    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>