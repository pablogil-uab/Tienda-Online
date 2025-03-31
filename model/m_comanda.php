<?php
function createComanda($conn, $usuariId, $total, $numElements) {
    $query = 'INSERT INTO "sale" ("date", "importe", "numero_productos", "id_usuari") VALUES (CURRENT_DATE, $1, $2, $3) RETURNING id';
    $result = pg_query_params($conn, $query, [$total, $numElements, $usuariId]);
    $comanda = pg_fetch_assoc($result);
    return $comanda['id'];
}

function createLiniaComanda($conn, $comandaId, $productId, $nomProducte, $quantitat, $preuUnitari, $preuTotal) {
    $query = 'INSERT INTO "sale_products" ("sale_id", "product_id", "product_name", "quantity", "precio_unidad", "precio_total") VALUES ($1, $2, $3, $4, $5, $6)';
    pg_query_params($conn, $query, [$comandaId, $productId, $nomProducte, $quantitat, $preuUnitari, $preuTotal]);
}

function getUserOrders($conn, $userId) {
    $query = '
        SELECT 
            s.id AS "id",
            s."date",
            s."numero_productos",
            s."importe",
            sp."product_name",
            sp.quantity,
            sp."precio_unidad",
            sp."precio_total"
        FROM 
            "sale" s
        LEFT JOIN 
            "sale_products" sp ON s.id = sp."sale_id"
        WHERE 
            s."id_usuari" = $1
        ORDER BY 
            s."date" DESC
    ';
    $result = pg_query_params($conn, $query, [$userId]);

    if (!$result) {
        return [];
    }

    $orders = [];
    while ($order = pg_fetch_assoc($result)) {
        $comandaId = $order['id'];
        if (!isset($orders[$comandaId])) {
            $orders[$comandaId] = [
                'date' => $order['date'],
                'numero_productos' => $order['numero_productos'],
                'importe' => $order['importe'],
                'productos' => []
            ];
        }
        $orders[$comandaId]['productos'][] = [
            'product_name' => $order['product_name'],
            'quantity' => $order['quantity'],
            'precio_unidad' => $order['precio_unidad'],
            'precio_total' => $order['precio_total']
        ];
    }

    return $orders;
}

?>