<?php

header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/carrito.css?v=' . time(); ?>">
    <script src="<?php echo BASE_URL . '/../js/scripts.js?v=' . time(); ?>"></script>
</head>
<body>
    <h1>Tu Carrito</h1>

    <div id="cart-summary">
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Tu carrito está vacío. ¡Añade productos para comenzar!</p>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $productId => $product): ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars(str_replace('/public_html', '', $product['img'])) ?>" alt="Imagen del producto" class="product-image"></td>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><?php echo number_format($product['precio'], 2); ?> €</td>
                            <td>
                                <input type="number" id="quantity-<?php echo $productId; ?>" value="<?php echo $product['quantity']; ?>" min="1">
                            </td>
                            <td><?php echo number_format($product['precio'] * $product['quantity'], 2); ?> €</td>
                            <td>
                                <button class="btn" onclick="modifyQuantity(<?php echo $productId; ?>)">Modificar</button>
                                <button class="btn btn-danger" onclick="deleteProduct(<?php echo $productId; ?>)">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p class="cart-total"><strong>Total: <?php echo number_format($_SESSION['total'], 2); ?> €</strong></p>
        <?php endif; ?>
    </div>

   
    <div class="cart-actions">
        <button type="button" class="btn btn-warning" onclick="emptyCart()">Vaciar carrito</button>
        <?php if (!empty($_SESSION['cart'])): ?>
            <form action="index.php?action=comanda" method="POST" style="display:inline;">
            <button type="submit" class="btn btn-success">Finalizar Compra</button>
        </form>
        <?php endif; ?>
    </div>

    <script src="../js/scripts.js"></script>
</body>
</html>