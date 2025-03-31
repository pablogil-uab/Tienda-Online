

<?php
function getCategories($connexio) : array {
    
    
    $sql = "SELECT * FROM category";
    $stmt = pg_query($connexio, $sql);

    if (!$stmt) {
        die("Error en la consulta: " . pg_last_error($connexio));
    }



    $filas = pg_fetch_all($stmt);
    if (!$filas) {
        echo "No hay categorías disponibles.";
        return [];
    }

    return $filas;
}




function getCategoriesById(int $categoryId) : array {
    $conn = connectaBD();
    $sql = 'SELECT id, name FROM category WHERE id = $1';
    $result = pg_query_params($conn, $sql, array((int) $categoryId));



    if (!$result) {
        die("Error en la consulta: " . pg_last_error($conn));
    }

    $categories = pg_fetch_all($result);
    return $categories;
}

?>