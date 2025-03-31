

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// index.php
require_once __DIR__.'/base-url-config.php';
$action = $_GET['action'] ?? NULL;

switch ($action) {
    case 'categoria':
        require __DIR__.'/resources/resource_categoria.php';
        break;
    case 'productes':
        require __DIR__.'/resources/resource_product.php';
        break;
    case 'productdetail':
        require __DIR__.'/resources/resource_productdetail.php';
        break;
    case 'register':
        require __DIR__.'/resources/resource_registre.php';
        break;
    case 'login':
        require __DIR__.'/resources/resource_login.php';
        break;
    case 'carrito':
        require __DIR__.'/resources/resource_carrito.php';
        break;
    case 'comanda':
        require __DIR__.'/resources/resource_comanda.php';
        break;
    case 'pedidos':
        require __DIR__.'/resources/resource_pedidos.php';
        break;
    default:
        require __DIR__.'/resources/resource_pantalla_principal.php';
    }

?>