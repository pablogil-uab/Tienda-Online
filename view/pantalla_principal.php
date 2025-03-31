
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/inicio.css?v=' . time(); ?>">
</head>

<div class="fotosInici">
    <img src="/../img/banner3.jpg" alt="banner de Deportex">
    <div class="texto-banner">Deportex</div>
</div>
</div>

<div>
    <h3>Productos Recomendados</h3>
    <div id="productos-recomendados" class="grid">
        <?php foreach ($productesRecomanats as $product): ?>
            <div class="producto-recomendado">
                <a href="/../index.php?action=productdetail&id=<?= $product['id'] ?>">
                    <img src="<?= htmlspecialchars(str_replace('/public_html', '', $product['img'])) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>">
                    <h4 class="nom-producte"><?= htmlspecialchars($product['name']) ?></h4>
                    <p class="preu-producte"><?= htmlspecialchars($product['precio']) ?>€</p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</head>
<body></body>