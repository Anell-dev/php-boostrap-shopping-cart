<?php
class Product
{
    private $id;
    private $name;
    private $price;
    private $stock;

    // Constructor que incluye el ID opcional
    public function __construct($name, $price, $stock, $id = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->id = $id ?? uniqid();  // Generar un ID único si no se proporciona uno
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }
    // Listar todos los productos
    public static function getAllProducts()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['products']) ? $_SESSION['products'] : [];
    }
    // Método para actualizar productos
    public static function updateProducts($id, $name, $price, $stock)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as &$product) {
                if ($product->getId() === $id) {
                    $product->name = $name;
                    $product->price = $price;
                    $product->stock = $stock;
                    return true;
                }
            }
        }
        return false; // Retorna false si no se encontró el producto
    }

    public static function deleteProduct($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $key => $product) {
                if ($product->getId() === $id) {
                    // Elimina el producto del array
                    unset($_SESSION['products'][$key]);
                    return true; // Retorna true si se eliminó el producto
                }
            }
        }
        return false; // Retorna false si no se encontró el producto
    }
}
