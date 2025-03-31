<?php


function getCartProducts() {
    $cartProducts = [];

    if (isset($_SESSION['name']) && isset($_SESSION['price']) && isset($_SESSION['quantity'])) {
        foreach ($_SESSION['name'] as $productId => $name) {
            $cartProducts[$productId] = [
                'name' => $name,
                'img' => isset($_SESSION['img'][$productId]) ? $_SESSION['img'][$productId] : '',
                'price' => $_SESSION['price'][$productId],
                'quantity' => $_SESSION['quantity'][$productId]
            ];
        }
    }

    return $cartProducts;
}


function getCartTotal() {
    $total = 0;

    if (isset($_SESSION['price']) && isset($_SESSION['quantity'])) {
        foreach ($_SESSION['price'] as $productId => $price) {
            $quantity = $_SESSION['quantity'][$productId];
            $total += $price * $quantity;
        }
    }

    return $total;
}


function deleteProductFromCart($productId) {
    if (isset($_SESSION['name'][$productId])) {
        unset($_SESSION['name'][$productId]);
        unset($_SESSION['img'][$productId]);
        unset($_SESSION['price'][$productId]);
        unset($_SESSION['quantity'][$productId]);
    }
}

function modifyProductQuantity($productId, $newQuantity) {
    if (isset($_SESSION['quantity'][$productId])) {
        $_SESSION['quantity'][$productId] = $newQuantity;
    }
}


function emptyCart() {
    $_SESSION['name'] = [];
    $_SESSION['img'] = [];
    $_SESSION['price'] = [];
    $_SESSION['quantity'] = [];
}

?>