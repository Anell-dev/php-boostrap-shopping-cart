<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">

  <!-- Animated css -->
  <!-- <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> -->

  <title>E-Commerce | Shopping Store</title>

</head>

<body>
  <div class="conatiner-up-to-navbar">
    <div>
      <p>PANAMA</p>
      <img src="./assets/img/pngwing.com.png" alt="">
      <i class="bi bi-chevron-down"></i>
    </div>
    <div>
      <p>SING IN</p>
      <p>WHISTLIST</p>
    </div>
  </div>
  <?php require("includes/navbar.php"); ?>

  <div class="hero">
    <div class="hero-img">
      <img src="assets/img/dasboard.png" alt="imagen" srcset="">

    </div>
    <!-- Contenido a la derecha -->
    <div class="hero-content">
      <h2>Este proyecto fue hecho por los desarroladores <br> <a href="https://github.com/brayanalmengor04">Brayan Almengor</a> & <a href="https://github.com/Anell-dev">Edwin Gonzalez</a></h2>
      <div class="container-button">
        <a href="/php-boostrap-shopping-cart/views/agregar.php" data-section="add-product" class="animate__animated animate__rubberBand animate__delay-1s">Start now!</a>
      </div>

    </div>
  </div>
  <!-- Agregarme los footers------------------------------------------------------------- -->
  <?php require("includes/footer.php"); ?>
  <script src="assets/js/navbar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
</body>

</html>