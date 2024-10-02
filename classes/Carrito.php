<?php
if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

class Carrito
{
  public function agregarProducto($id, $nombre, $precio, $cantidad)
  {
    if (isset($_SESSION['carrito'][$id])) {
      $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
      $_SESSION['carrito'][$id]['total'] = $_SESSION['carrito'][$id]['precio'] * $_SESSION['carrito'][$id]['cantidad'];
    } else {
      $_SESSION['carrito'][$id] = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'total' => $precio * $cantidad
      ];
    }

    return ['respuesta' => 'ok'];
  }

  public function eliminarProducto($id)
  {
    if (isset($_SESSION['carrito'][$id])) {
      unset($_SESSION['carrito'][$id]);
      return ['respuesta' => 'ok'];
    }
    return ['respuesta' => 'error', 'mensaje' => 'Producto no encontrado'];
  }

  public function actualizarCantidadProducto($id, $nuevaCantidad)
  {
    if (isset($_SESSION['carrito'][$id])) {
      $_SESSION['carrito'][$id]['cantidad'] = $nuevaCantidad;
      $_SESSION['carrito'][$id]['total'] = $_SESSION['carrito'][$id]['precio'] * $_SESSION['carrito'][$id]['cantidad'];

      if ($_SESSION['carrito'][$id]['cantidad'] == 0) {
        $this->eliminarProducto($id);
      }

      return ['respuesta' => 'ok'];
    }
    return ['respuesta' => 'error', 'mensaje' => 'Producto no encontrado'];
  }

  public function mostrarProductos()
  {
    return $_SESSION['carrito'];
  }

  public function calcularTotal()
  {
    $suma_total = 0;
    $cantidad_productos = 0;

    foreach ($_SESSION['carrito'] as $producto) {
      if (isset($producto['total'], $producto['cantidad'])) {
        $suma_total += $producto['total'];
        $cantidad_productos += $producto['cantidad'];
      }
    }

    return ['total' => $suma_total, 'cantidad' => $cantidad_productos];
  }

  public static function obtenerCantidadProductos()
  {
    $cantidad_productos = 0;
    foreach ($_SESSION['carrito'] as $producto) {
      if (isset($producto['cantidad'])) {
        $cantidad_productos += $producto['cantidad'];
      }
    }
    return $cantidad_productos;
  }

  public function obtenerTotal()
  {
    $suma_total = 0;
    foreach ($_SESSION['carrito'] as $producto) {
      if (isset($producto['total'])) {
        $suma_total += $producto['total'];
      }
    }
    return $suma_total;
  }

  public function vaciarCarrito()
  {
    $_SESSION['carrito'] = [];
  }
}
