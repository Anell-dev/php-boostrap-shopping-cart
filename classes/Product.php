<?php
class Product
{
    private $id;
    private $name;
    private $price;
    private $stock;

    public function __construct($name, $price, $stock, $id = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->id = $id ?? uniqid();
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

    public static function getAllProducts()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['products']) ? $_SESSION['products'] : [];
    }

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
        return false;
    }

    public static function deleteProduct($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $key => $product) {
                if ($product->getId() === $id) {
                    unset($_SESSION['products'][$key]);
                    return true;
                }
            }
        }
        return false;
    }
}
