<?php
session_start();
require('../classes/Carrito.php');

$carrito = new Carrito();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoId = $_POST['producto_id'];

    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        if ($carrito->eliminarProducto($productoId)['respuesta'] == 'ok') {
            header('location:storecar.php?msg=Se ha eliminado el producto!');
        }
    }

    if (isset($_POST['accion']) && $_POST['accion'] === 'actualizar') {
        $nuevaCantidad = intval($_POST['nueva_cantidad']);
        if ($carrito->actualizarCantidadProducto($productoId, $nuevaCantidad)['respuesta'] == 'ok') {
            header('location:storecar.php?msg=Actualizacion de cantidad con exito!');
        }
    }
}
?>


<!doctype html>
<html lang="es">

<head>
    <title>Cart</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/carrito.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <?php require("../header.php"); ?>
    <?php require("../includes/navbar.php"); ?>

    <div class="container-shopping-cart">
        <div class="shopping-cart">
            <?php
            if (isset($_GET['msg'])) {
                echo "<p id='message'>" . $_GET['msg'] . "</p>";
            }
            ?>
            <h2>Shopping Cart</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Details</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($carrito->mostrarProductos() as $producto) { ?>
                        <tr>
                            <td>
                                <div class="container-img-and-details">
                                    <img src="../assets/img/laptops-2048px-8826.webp" alt="Product Image" class="product-image">
                                    <div class="all-products-details">
                                        <p><?php echo $producto['nombre'] ?></p>
                                        <p>Colour: Color</p>
                                        <p>Details: product of last generation.</p>
                                        <p>Product Code: <?php echo $producto['id'] ?></p>
                                        <a class="edit-link">Edit</a> |
                                        <a class="save-for-later">Save for later</a>
                                    </div>
                                </div>
                            </td>
                            <td class="quantity">
                                <form method="POST" action="">
                                    <input type="number" name="nueva_cantidad" value="<?php echo $producto['cantidad'] ?>" min="0" onchange="this.form.submit()">
                                    <input type="hidden" name="accion" value="actualizar">
                                    <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                </form>
                                <br>
                                <form method="POST" action="">
                                    <input type="hidden" name="accion" value="eliminar">
                                    <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                    <button type="submit" class="remove-link">
                                        Remove
                                    </button>
                                </form>
                            </td>
                            <td>£<?php echo $producto['precio'] ?></td>
                            <td class="total-price">£<?php echo $producto['total'] ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <a class="continue-shopping" href="#">CONTINUE SHOPPING</a>
        </div>

        <div class="order-summary">
            <h3>ORDER SUMMARY</h3>
            <p>Items <span><?php echo $carrito->obtenerCantidadProductos() ?></span></p>
            <p>Total <span>£<?php echo $carrito->obtenerTotal() ?></span></p>
            <p>Shipping
                <select>
                    <option>Standard Delivery - £0.00</option>
                    <option>Express Delivery - £0.00</option>
                </select>
            </p>
            <p>Total Cost <span>£<?php echo $carrito->obtenerTotal() ?></span></p>
            <button>CHECKOUT</button>
            <a class="promotional-code">PROMOTIONAL CODE</a>
        </div>
    </div>


    <?php require("../includes/footer.php"); ?>
    <script src="../assets/js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>