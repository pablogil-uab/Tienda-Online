<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Deportex | Tu tienda de deportes</title>
    <script src="../js/scripts.js" defer></script>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/registro.css?v=' . time(); ?>">
</head>
<body>

<h1>Registro</h1>
<div class="form-container">
<form action="../controller/registre.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required >
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" maxlength="30" required>
    <br>
    <label for="poblacion">Población:</label>
    <input type="text" id="poblacion" name="poblacion" maxlength="30" required>
    <br>
    <label for="codigo_postal">Código Postal:</label>
    <input type="text" id="codigo_postal" name="codigo_postal" pattern="\d{5}" title="El código postal debe tener 5 dígitos" required>
    <br>
    <button type="submit">Registrarse</button>
</form>
</div>

</body>
</html>