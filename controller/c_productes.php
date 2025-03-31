<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once __DIR__.'/../model/m_connectaBD.php';
include_once __DIR__.'/../model/m_productes.php';
require_once __DIR__.'/../session_start.php';

$connexio = connectaBD();

$categoria = $_GET['category_id'] ?? null;

$productes = getProductesPerCategoria($categoria, $connexio);

include __DIR__ . "/../view/llistat_productes_categoria.php";

?>