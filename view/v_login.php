<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/login.css?v=' . time(); ?>">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <div class="form-container">
        
        <form action="../controller/c_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <p class="register-link">¿No tienes cuenta? <a href="index.php?action=register">Regístrate aquí</a></p>
    </div>
</body>
