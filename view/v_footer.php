<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/footer.css?v=' . time(); ?>">
</head>
<body>
   

    <footer>
        <div id="carrito-resumen">
                <h3 id="tituloresumen">Resumen del carrito</h3>
          
                <p id="cart-total-items">Número de productos: <?php echo isset($_SESSION['totalUnits']) ? htmlentities($_SESSION['totalUnits'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : 0; ?></p>

 
                <p id="cart-total-price">Importe total: <?php echo isset($_SESSION['total']) ? htmlentities($_SESSION['total'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : 0; ?> €</p>
        </div>
        <div id="peu_pagina">
           
            <div class="footer-box">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="/index.php?action=inicio">Inicio</a></li>
                    <li><a href="/index.php?action=categoria">Categorías</a></li>
                    <li><a href="/index.php?action=carrito">Carrito</a></li>
                </ul>
            </div>

           
            <div class="footer-box">
                <h3>Redes Sociales</h3>
                <div class="red_social">
                    <p>Instagram: deportex_official</p>
                    <p>Facebook: deportex_official</p>
                </div>
            </div>

        
            <div class="footer-box">
                <h3>Contacto</h3>
                <p>Email:info@deportex.com</p>
                <p>Teléfono:+34 123 456 789</a></p>
                <p>Dirección: C/ Aves Maritimas, 123, Barcelona</p>
            </div>

        </div>

        <div id="footer-bottom">
            <p>&copy; 2025 Deportex. Todos los derechos reservados.</p>
        </div>

        
    </footer>
</body>
</html>
