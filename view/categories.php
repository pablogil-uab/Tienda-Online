
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportex | Tu tienda de deportes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/../CSS/categorias.css?v=' . time(); ?>">
</head>

<div id="pag-categories">
    <h1 id="titol-categories">DEPORTES</h1>
    <div id="grid-categories" class="grid">

        <?php foreach ($categories as $category): ?>
            <div class="card-categoria">
                <a href="/../index.php?action=productes&category_id=<?= $category['id'] ?>">
                    <img src="<?= htmlspecialchars(str_replace('/public_html', '', $category['img'])) ?>" 
                         alt="<?= htmlspecialchars($category['name']) ?>">
                    <h3 class="nom-categoria"><?= htmlspecialchars($category['name']) ?></h3>

                </a>

            </div>
        <?php endforeach; ?>
    </div>
</div>
