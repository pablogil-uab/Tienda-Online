<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/productos.css?v=' . time(); ?>">
    <script src="<?php echo BASE_URL . '/../js/scripts.js?v=' . time(); ?>"></script>

</head>


<div id="pag-detall-producte">
    <div id="detall-producte">
        <h1 id="titol-detall"><?= htmlspecialchars($product['name']) ?></h1>
        <img id="imatge-detall" 
             src="<?= htmlspecialchars(str_replace('/public_html', '', $product['img'])) ?>" 
             alt="<?= htmlspecialchars($product['name']) ?>">
        <p id="desc-detall"><?= htmlspecialchars($product['detalle']) ?></p>
        <p id="preu-detall">Precio: <?= htmlspecialchars($product['precio']) ?>€</p>
        <label for="quantity">Cantidad:</label>
        <input type="number" id="quantity" value="1" min="1">

        <button class="boto" 
        onclick="<?php 
        if (isset($_SESSION['usuario'])): 
            ?> addToCart(<?= $product['id'] ?>) 
        <?php else: ?> 
            alert('Por favor, inicia sesión para añadir productos al carrito') 
        <?php endif; ?>">Añadir al carrito
        </button>  
    </div>
</div>