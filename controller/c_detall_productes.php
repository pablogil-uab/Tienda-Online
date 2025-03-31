<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../model/m_connectaBD.php";
require_once __DIR__ . "/../model/m_productes.php";
require_once __DIR__ .'/../session_start.php';

$connexio = connectaBD();
$productId = $_GET['id'] ?? null;
$product = getProductesPerId($productId, $connexio);


include __DIR__ . "/../view/v_detall_productes.php";
?>