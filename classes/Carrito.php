<?php

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

class Carrito
{
  public $productos = [];
  public $suma_total = 0;
  public $cantidad_productos_en_el_carro = 0;

  public function __construct(array $productos = [], float $suma_total = 0, int $cantidad_productos_en_el_carro = 0)
  {
    $this->productos = $productos;
    $this->suma_total = $suma_total;
    $this->cantidad_productos_en_el_carro = $cantidad_productos_en_el_carro;
  }

  public function agregarProducto($id, $nombre, $precio, $cantidad)
  {
    if (isset($this->productos[$id])) {
      $this->productos[$id]['cantidad'] += $cantidad;
      $this->productos[$id]['total'] = $this->productos[$id]['precio'] * $this->productos[$id]['cantidad'];
    } else {
      $this->productos[$id] = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'total' => $precio * $cantidad
      ];
    }

    // Actualizar la sesión manualmente para evitar problemas con índices
    $_SESSION['carrito'][$id] = $this->productos[$id];

    // Actualizar la propiedad productos con el contenido de la sesión
    $this->productos = $_SESSION['carrito'];

    // $this->calcularTotal();

    return ['respuesta' => 'ok'];
  }

  public function mostrarProductos()
  {
    return $this->$_SESSION['carrito'];
  }

  public function eliminarProducto($id)
  {
    if (isset($this->productos[$id])) {
      unset($this->productos[$id]);
      $_SESSION['carrito'] = $this->productos;
      $this->calcularTotal();
      return ['respuesta' => 'ok'];
    }
    return ['respuesta' => 'error', 'mensaje' => 'Producto no encontrado'];
  }

  public function calcularTotal()
  {
    $this->suma_total = 0;
    $this->cantidad_productos_en_el_carro = 0;

    foreach ($this->productos as $producto) {
      if (isset($producto['total'], $producto['cantidad'])) {
        $this->suma_total += $producto['total'];
        $this->cantidad_productos_en_el_carro += $producto['cantidad'];
      }
    }

    // return
  }

  public function obtenerCantidadProductos()
  {
    return $this->cantidad_productos_en_el_carro;
  }

  public function obtenerTotal()
  {
    return $this->suma_total;
  }

  public function vaciarCarrito()
  {
    $this->productos = [];
    $this->suma_total = 0;
    $this->cantidad_productos_en_el_carro = 0;
    $_SESSION['carrito'] = [];
  }
}
