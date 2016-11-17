<?php

/**
 * Class Cart
 * working in Cart
 */
class Cart
{

    /**
     * add product in cart
     * @param int $id
     * @return integer
     */
    public static function addProduct($id)
    {
        $id = intval($id);
        $productsInCart = array();

        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * count products in Cart
     * @return integer
     */
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Return array products in cart
     * @return mixed: boolean or array
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * Get total price
     * @param array $products 
     * @return integer
     */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Clear cart
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    /**
     * delete product from catr
     * @param integer $id <p>id товара</p>
     */
    public static function deleteProduct($id)
    {
        $productsInCart = self::getProducts();
        unset($productsInCart[$id]);
        $_SESSION['products'] = $productsInCart;
    }

}
