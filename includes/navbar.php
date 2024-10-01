<?php
$cantidad_productos = 0;
if (!empty($_SESSION["carrito"])) {

    foreach ($_SESSION['carrito'] as $producto) {
        if (isset($producto['cantidad'])) {
            $cantidad_productos += $producto['cantidad'];
        }
    }
} else {
    $cantidad_productos = 0; 
}
?>
<nav class="container__principal-nav">
    <p class="container__logotipe">
        NEXLINE
    </p>

    <ul class="container__nav-list">
        <li class="container__nav-items">
            <a href="/php-boostrap-shopping-cart" data-section="home">HOME</a>
        </li>

        <li class="container__nav-items">
            <a href="/php-boostrap-shopping-cart/views/agregar.php" data-section="add-product">ADD PRODUCT</a>
        </li>

        <li class="container__nav-items">
            <a href="/php-boostrap-shopping-cart/views/product.php" data-section="carrusel-product">CARRUCEL PRODUCT</a>
        </li>

        <li class="container__nav-items">
            <a href="/php-boostrap-shopping-cart/views/storecar.php" data-section="store-card">STORECART</a>
        </li>
    </ul>

    <div class="container-barSearch-and-cart">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search...">
            <i class="bi bi-search search-icon"></i>
        </div>

        <div class="cart-container">
            <button class="cart-button">
                <i class="bi bi-cart"></i>
                <span class="cart-count">
                <?php echo  $cantidad_productos?>
                </span>
            </button>
        </div>
    </div>
</nav>

<div class="container__principal-section">
    <div id="home" class="container__section-items">
        <h6>HOME</h6>
    </div>
    <div id="add-product" class="container__section-items">
        <h6>ADD PRODUCT</h6>
    </div>
    <div id="carrusel-product" class="container__section-items">
        <h6>CARRUCEL PRODUCT</h6>
    </div>
    <div id="store-card" class="container__section-items">
        <h6>STORE CART</h6>
    </div>
</div>