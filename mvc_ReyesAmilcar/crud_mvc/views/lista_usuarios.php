<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Bucle PHP para iterar sobre el array de usuarios -->
                <?php foreach ($usuarios as $usuario): ?>
                 <!-- Fila para cada usuario -->
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td class="actions">
                        <a href="index.php?action=actualizar&id=<?= $usuario['id'] ?>">Editar</a>
                        <a href="index.php?action=eliminar&id=<?= $usuario['id'] ?>" onclick="return confirm('¿Estás seguro de querer eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?> <!-- Fin del bucle PHP -->
            </tbody>
        </table>
        <a href="index.php?action=crear" class="btn btn-agregar">Agregar Nuevo Usuario</a>
    </div>
</body>
</html>