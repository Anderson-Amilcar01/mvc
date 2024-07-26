<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Actualizar Usuario</h1>
    <form action="index.php?action=actualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        
        <button type="submit">Actualizar Usuario</button>
    </form>
    <a href="index.php">Volver a la lista</a>
</body>
</html>