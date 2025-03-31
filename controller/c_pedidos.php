<?php

require_once __DIR__ . '/../session_start.php';
require_once __DIR__ . '/../model/m_connectaBD.php';
require_once __DIR__ . '/../model/m_comanda.php';


if (!isset($_SESSION['usuario'])) {
    header('Location: ../view/v_login.php'); 
    exit;
}

$conn = connectaBD();
$userId = $_SESSION['usuario']['id'];  


$orders = getUserOrders($conn, $userId);


include __DIR__. '/../view/v_pedido.php';
?>
