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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Modules</title>
</head>

<body>
    <header>
        <h1>Select a module</h1>
    </header>
    <main>
        <div class="">
            <a href="index.php?action=create" class="btn btn-success my-2">Crear nuevo producto</a>
            <a href="index.php?action=logout" class="btn btn-danger">Cerrar sesión</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modulos as $mdl) : ?>
                    <tr>
                        <td><?= htmlspecialchars($mdl['id_curso']) ?></td>
                        <td><?= htmlspecialchars($mdl['nombre']) ?></td>
                        <td><?= htmlspecialchars($mdl['descripcion']) ?></td>
                        <td class="actions">
                            <a href="index.php?action=update&id=<?= $mdl['id_curso'] ?>" class="btn btn-info">Editar</a>
                            <a href="index.php?action=delete&id=<?= $mdl['id_curso'] ?>" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php require_once 'app/assets/footer.php'; ?>

    <script src="public/js/hover.js"></script>
</body>

</html>