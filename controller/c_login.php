<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ ."/../model/m_connectaBD.php";
require_once __DIR__ ."/../model/m_usuaris.php";
require_once __DIR__ .'/../session_start.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    var_dump($_POST);
    
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

 
    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = 'Por favor, completa todos los campos.';
        header('Location: '. $_SERVER['HTTP_REFERER']); 
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = 'El email no tiene un formato válido.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    try {
        $resultado = getUsuariByEmail($email);
    } catch (Exception $e) {
        $_SESSION['error_message'] = 'Hubo un problema al obtener el usuario: ' . $e->getMessage();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (!$resultado) {
        $_SESSION['error_message'] = 'El email no está registrado.';
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
        exit;
    }

  
    if (!password_verify($password, $resultado['password'])) {
        $_SESSION['error_message'] = 'La contraseña es incorrecta.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    session_regenerate_id(true); 
    $_SESSION['usuario'] = [
        'id' => $resultado['id'],
        'name' => $resultado['name'],
        'email' => $resultado['email'],
    ];

    $_SESSION['success_message'] = '¡Bienvenido, ' . htmlspecialchars($resultado['name']) . '!';
    header('Location: /index.php');
    exit;
}



include __DIR__."/../view/v_login.php"
?>