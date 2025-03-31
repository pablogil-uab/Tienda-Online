<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ ."/../model/m_connectaBD.php";
require_once __DIR__ ."/../model/m_usuaris.php";
require_once __DIR__ .'/../session_start.php';

$conn = connectaBD();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $poblacion = $_POST['poblacion'] ?? '';
    $codigo_postal = $_POST['codigo_postal'] ?? '';


    if (empty($nombre)) {
        $errors[] = "El camp 'Nombre' és obligatori.";
    }
    if (empty($email)) {
        $errors[] = "El camp 'Email' és obligatori.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El format de l'email no és vàlid.";
    }
    if (empty($password)) {
        $errors[] = "El camp 'Contraseña' és obligatori.";
    }
    if (!empty($codigo_postal) && !ctype_digit($codigo_postal)) {
        $errors[] = "El camp 'Código Postal' ha de ser un valor enter.";
    }

    if (!empty($errors)) {
        echo "Error en algunos de los campos, colocalos correctamente.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


   
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

 
    $resultado = signUp($nombre, $email, $password_hash, $direccion, $poblacion, $codigo_postal);



    if ($resultado) {
        $_SESSION['usuario'] = [
            'id' => $resultado['id'],
            'name' => $resultado['name'],
            'email' => $resultado['email'],
        ];

        
        $_SESSION['success_message'] = '¡Registro exitoso! Bienvenido, ' . htmlspecialchars($resultado['name']) . '.';
        header('Location: /../index.php');  
        exit;
    } else {
        $_SESSION['error_message'] = 'Error al registrar el usuario. Intenta nuevamente.';
        echo "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    

}
    require_once __DIR__."/../view/v_registre.php";

?>

