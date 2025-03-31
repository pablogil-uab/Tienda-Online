<?php

function emailExists($email)
{

    $connect = connectaBD();
    $sql = "SELECT id FROM usuario WHERE correuElectronic=$1";
    $params = [$email];
    $result = pg_query_params($connect, $sql, $params) or die("Cannot execute query:");
    return pg_fetch_all($result) == false;
}

function signUp($nombre, $email, $password, $direccion, $poblacion, $codigo_postal) {
  
    $conn = connectaBD();

    
    $sql = 'INSERT INTO "usuario" ("name", "correuElectronic", "password", "adreça", "poblacio", "codiPostal") 
            VALUES ($1, $2, $3, $4, $5, $6)';


    $result = pg_query_params($conn, $sql, array($nombre, $email, $password, $direccion, $poblacion, $codigo_postal));

    if ($result) {
        return true;
    } else {
        return false;
    }
}

    function getUsuariByEmail(string $email) {
    $conn = connectaBD();

    $sql = 'SELECT *
            FROM "usuario"
            WHERE "correuElectronic" = $1
            LIMIT 1';

    $result = pg_query_params($conn, $sql, [$email]);

    if (!$result) {
        error_log(pg_last_error($conn));
        pg_close($conn);
        return null;
    }

    var_dump($result);

    $row = pg_fetch_assoc($result);
    pg_close($conn);
    return $row;
}

?>