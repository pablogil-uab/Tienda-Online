<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/pedidos.css?v=' . time(); ?>">
</head>
<body>
<div id="mis-comandas-container">
        <h1 id="mis-comandas-title">Mis Pedidos</h1>

        <?php if (empty($orders)): ?>
            <p id="no-orders-msg">No has realizado ninguna compra aún.</p>
        <?php else: ?>
            <table id="orders-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Número de productos</th>
                        <th>Importe Total</th>
                        <th>Detalles de Productos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlentities($order['date'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></td>
                            <td><?php echo htmlentities($order['numero_productos'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></td>
                            <td><?php echo htmlentities($order['importe'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> €</td>
                            <td>
                                <ul>
                                    <?php foreach ($order['productos'] as $producto): ?>
                                        <li>
                                            <?php echo htmlentities($producto['product_name'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> - 
                                            Cantidad: <?php echo htmlentities($producto['quantity'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> - 
                                            Precio Unitario: <?php echo htmlentities($producto['precio_unidad'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> € - 
                                            Total: <?php echo htmlentities($producto['precio_total'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> €
                                        </li>

                                        
                                    <?php endforeach; ?>
                                </ul>
                            </td>



                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>


    </div>
</body>