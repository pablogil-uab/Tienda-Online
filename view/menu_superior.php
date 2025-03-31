<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/menuSuperior.css?v=' . time(); ?>">
</head>

<header>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php if (isset($_SESSION['usuario'])): ?>
    <p>Sesión activa</p>
<?php else: ?>
    <p>Sesión no iniciada</p>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function () {
            $('.desplegable').hover(
                function () {
                    $(this).find('.menu_desplegable').stop(true, true).slideDown(200);
                },
                function () {
                    $(this).find('.menu_desplegable').stop(true, true).slideUp(200);
                }
            );
        });
    </script>
</header>
<body>
    <div class="container-navbar">

    <nav class="navbar-container">	
    <ul class="menu">
        <li id="Titulo"><a href="/../index.php?action=">Inicio</a></li>
        <li id="categorias"><a href="/../index.php?action=categoria">Deportes</a></li>
        <li id="registro"><a href="/../index.php?action=register">Registro</a></li>
        <li class="desplegable">
            <a href="#" class="boto_desplegable">Mi Cuenta</a>
            <ul class="menu_desplegable">
                <li><a href="/../index.php?action=login">Iniciar sesión</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
                <li><a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?action=pedidos' : 'index.php?action=login'; ?>">Mis Pedidos</a></li>
            </ul>
        </li>
        <li id="carrito"><a href="/../index.php?action=carrito">Carrito</a></li>
    </ul>
</nav>

    <main id="contingut">
    </main>
</body>
</html>