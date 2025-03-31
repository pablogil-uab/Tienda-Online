
<?php

 function getProductesPerCategoria($categoria_id, $connexio) 
    {


        $sql = 'SELECT id,"name",precio,img FROM product WHERE category_id = $1';
        
        $result = pg_prepare($connexio, "consulta_productes", $sql);
        $result = pg_execute($connexio, "consulta_productes", array($categoria_id));

        if (!$result) 
        {
            throw new Exception("(pg_query)". pg_last_error());
        }
        
        $productes = pg_fetch_all($result);
        return $productes;
    }


    function getProductesPerId($productId, $connexio) {
        
        $sql = 'SELECT * FROM Product WHERE id =$1 ';
        $result = pg_prepare($connexio, "consulta_producte", $sql);
        $result = pg_execute($connexio, "consulta_producte", array($productId));
        if (!$result) {
        throw new Exception("(pg_query)" . pg_last_error());
        }
        return pg_fetch_assoc($result);
    }


    function getProductesRecomanats($connexio) {
        $sql = 'SELECT id, "name", precio, img FROM product WHERE destacado = TRUE LIMIT 4';
    
        $result = pg_query($connexio, $sql);
    
        if (!$result) {
            throw new Exception("(pg_query)". pg_last_error());
        }
    
        $productes = pg_fetch_all($result);
        return $productes;
    }
    
?>
