<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/selectModule.css">
    <link rel="stylesheet" href="public/css/levels.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Module <?= $niveles[0]['id_curso'] ?> levels</title>
</head>

<body>
    <header>
        <h1>Module <?= $niveles[0]['id_curso'] ?> levels</h1>
    </header>

    <main>
        <div id="game-container">
            <?php

            if (isset($niveles) && !empty($niveles)) {

                $a1 = 12; // Incremento horizontal
                $d1 = 15; // Valor inicial para left
                $d2 = 80; // Ajustado para que esté visible inicialmente
                $counter = 1;

                $platformWidth = 100;
                $platformHeight = 30;
                $widthIncrement = 30;
                $heightIncrement = 15;

                $exponentialFactor = 1.5; // Factor exponencial para el incremento vertical
                $baseIncrement = 5; // Incremento base para el primer nivel

                foreach ($niveles as $levels) { ?>
                    <div class="platform" data-level="<?= $levels['id_nivel'] ?>" style="left: <?= $d1 ?>%; top: <?= $d2 ?>%; width: <?= $platformWidth ?>px; height: <?= $platformHeight ?>px;"></div>
                <?php
                    $d1 += $a1; // Incrementar posición horizontal

                    // Calcular el nuevo incremento vertical exponencialmente
                    $counter += 1;
                    $d2 -= $baseIncrement * pow($exponentialFactor, $counter); // Incremento exponencial
                    $platformWidth += $widthIncrement; // Incrementar el ancho de la plataforma
                    $platformHeight += $heightIncrement; // Incrementar el alto de la plataforma
                }
            } else { ?>
                <div class="errorMessage">
                    <p>No levels detected</p>
                </div>
            <?php } ?>
    </main>

    <?php require_once 'app/assets/footer.php'; ?>

    <script src="public/js/levels.js"></script>
</body>

</html>