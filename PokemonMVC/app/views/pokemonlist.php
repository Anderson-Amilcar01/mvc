<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="pokemon-grid">
        <?php foreach($pokemonList['results']as $pokemon):?>
            <div class="pokemon-card">
                <img src="<?= $pokemon['image']?>" alt="<? $pokemon['name']?>">
                <div class="pokemon-info">
                    <h2><?= ucfirst(string:$pokemon['name'])?></h2>
                    <div class="pokemon-types">
                        <?php foreach($pokemon['types']as $type):?>
                            <span class="type-<?= $type['name']?>"><?=ucfirst(string:$type['name'])?></span>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
    </div>
    <div class="pagination">
            <?php if($page>1):?>
                <a href="?page=<?=$page-1?>">&laquo; Anterior</a>
            <?php endif; ?>
            <span>Página <?=$page?></span>
            <?php if(count(value:$pokemonList['results'])==$itemsPerPage):?>
                <a href="?page=<?=$page+1?>">Próximo &raquo;</a>
            
            <?php endif; ?>
    </div>
</body>
</html>