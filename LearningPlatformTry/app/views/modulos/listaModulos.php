<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/selectModule.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Select a module</title>
</head>

<body>
    <header>
        <h1>Select a module</h1>
    </header>
    <main>
        <?php

        if (isset($modules) && !empty($modules)) {

            foreach ($modules as $module) { ?>
                <div class="moduleCard" data-module-id="<?php echo $module['id_curso']; ?>">
                    <div class="moduleCardBlock"></div>
                    <div class="moduleCardText">
                        <h1><?php echo $module['nombre']; ?></h1>
                        <p><?php echo $module['descripcion']; ?></p>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="errorMessage">
                <p>No modules detected</p>
            </div>
        <?php } ?>
        <button><a href="index.php?action=adminModulesView">Ver vista admin</a></button>
    </main>


    <?php require_once 'app/assets/footer.php'; ?>

    <script src="public/js/hover.js"></script>
</body>

</html>