<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/../session_start.php';
require_once __DIR__ . '/../model/m_connectaBD.php';
require_once __DIR__ . '/../model/m_productes.php';


if (!isset($_SESSION['usuario'])) {
    echo '<script> alert("Inicia sesión para gestionar el carrito")
          </script>';
    require __DIR__ . '/../view/v_login.php';
    require __DIR__. '/../view/v_footer.php';
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['action'])) {
        switch ($input['action']) {
            case 'add_to_cart':
                
                $productId = intval($input['id']);
                $unitsProduct = intval($input['unitsProduct']);

                
                $conn = connectaBD();
                $productDetails = getProductesPerId($productId, $conn);

                if ($productDetails) {
                    
                    $_SESSION['cart'][$productId] = [
                        'name' => $productDetails['name'],
                        'img' => $productDetails['img'],
                        'precio' => $productDetails['precio'],
                        'quantity' => isset($_SESSION['cart'][$productId]['quantity']) 
                                        ? $_SESSION['cart'][$productId]['quantity'] + $unitsProduct 
                                        : $unitsProduct
                    ];

               
                    $_SESSION['totalUnits'] = 0;
                    $_SESSION['total'] = 0;
                    foreach ($_SESSION['cart'] as $product) {
                        $_SESSION['totalUnits'] += $product['quantity'];
                        $_SESSION['total'] += $product['precio'] * $product['quantity'];
                    }

                    echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
                    
                } else {
                    echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
                }
            break;


            case 'modify_quantity':
                $productId = intval($input['id']);
                $newQuantity = intval($input['newQuantity']);

                if (isset($_SESSION['cart'][$productId])) {
                    $_SESSION['cart'][$productId]['quantity'] = $newQuantity;

                   
                    $_SESSION['totalUnits'] = 0;
                    $_SESSION['total'] = 0;
                    foreach ($_SESSION['cart'] as $product) {
                        $_SESSION['totalUnits'] += $product['quantity'];
                        $_SESSION['total'] += $product['precio'] * $product['quantity'];
                    }

                    echo json_encode(['success' => true, 'message' => 'Cantidad actualizada correctamente']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Producto no encontrado en el carrito']);
                }
                break;


                
            case 'delete_product':
                $productId = intval($input['id']);

                if (isset($_SESSION['cart'][$productId])) {
                    unset($_SESSION['cart'][$productId]);

                    // Recalcular el total
                    $_SESSION['totalUnits'] = 0;
                    $_SESSION['total'] = 0;
                    foreach ($_SESSION['cart'] as $product) {
                        $_SESSION['totalUnits'] += $product['quantity'];
                        $_SESSION['total'] += $product['precio'] * $product['quantity'];
                    }

                    echo json_encode(['success' => true, 'message' => 'Producto eliminado del carrito']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Producto no encontrado en el carrito']);
                }
                break;
            case 'empty_cart':
                   
                unset($_SESSION['cart']);
                $_SESSION['totalUnits'] = 0;
                $_SESSION['total'] = 0;
                    
              
                echo json_encode([
                    'success' => true,
                    'message' => 'Carrito vaciado correctamente',
                    'totalUnits' => $_SESSION['totalUnits'],
                    'totalPrice' => $_SESSION['total']
                ]);
                break;
    
            case 'get_cart_summary':
                    
                echo json_encode([
                    'totalUnits' => $_SESSION['totalUnits'] ?? 0,
                    'totalPrice' => $_SESSION['total'] ?? 0
                ]);
                break;
    

            default:
                echo json_encode(['success' => false, 'message' => 'Acción no reconocida']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No se especificó ninguna acción']);
    }
} else {
    
    require __DIR__ . '/../view/v_carrito.php';
}
?>
