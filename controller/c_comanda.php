<?php
require_once __DIR__ . '/../session_start.php';
require_once __DIR__ . '/../model/m_connectaBD.php';
require_once __DIR__ . '/../model/m_comanda.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: ../view/v_login.php'); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectaBD();
    $usuarioId = $_SESSION['usuario']['id'];
    $cart = $_SESSION['cart'];

    
    if (empty($cart)) {
        echo json_encode(['success' => false, 'message' => 'El carrito está vacío']);
        exit;
    }

    
    $total = array_reduce($cart, function ($sum, $product) {
        return $sum + ($product['precio'] * $product['quantity']);
    }, 0);

    $totalElements = 0;
    foreach ($cart as $item) {
        $totalElements += $item['quantity'];
    }
    
    $comandaId = createComanda($conn, $usuarioId, $total, $totalElements);

    
    foreach ($cart as $productId => $product) {
        createLiniaComanda(
            $conn,
            $comandaId,
            $productId,
            $product['name'],
            $product['quantity'],
            $product['precio'],
            $product['precio'] * $product['quantity']
        );
    }

   
    unset($_SESSION['cart']);
    $_SESSION['totalUnits'] = 0;
    $_SESSION['total'] = 0;

    require_once __DIR__ . '/../view/v_comanda.php';
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>