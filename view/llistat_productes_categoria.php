
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/listado.css?v=' . time(); ?>">
</head>

<div id="seccion productos">
    <h1 id="titulo-lista">PRODUCTOS DISPONIBLES</h1>
    <div id="productos-grid" class="grid">
        <?php foreach ($productes as $product): ?>
            <div class="">
                <a href="/../index.php?action=productdetail&id=<?= $product['id'] ?>">
                    <img src="<?= htmlspecialchars(str_replace('/public_html', '', $product['img'])) ?>" 
                        alt="<?= htmlspecialchars($product['name']) ?>">
                    <h3 class="nom-producte"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="preu-producte"><?= htmlspecialchars($product['precio']) ?>€</p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>