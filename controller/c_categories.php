<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once __DIR__.'/../model/m_connectaBD.php';
include_once __DIR__.'/../model/m_categoria.php';
require_once __DIR__ .'/../session_start.php';

$connexio = connectaBD();
$categories = getCategories($connexio);

include_once __DIR__ . '/../view/categories.php';
?>