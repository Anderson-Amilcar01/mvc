<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Agregar Usuario</h1>
    <form action="index.php?action=crear" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit">Agregar Usuario</button>
    </form>
    <a href="index.php">Volver a la lista</a>
</body>
</html>