<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <header>
        <h1>Bienvenidos</h1>
    </header>
    <div class="container">
        <h2>login</h2>
    <form action="login.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username" placeholder="nombre de usuario">
        <label for="password">password</label>
        <input type="password" name="password" id="password" placeholder="contraseña"> <br>
        <input type="submit" value="login">
        </form>
        <a href="registra.php">¿No tienes cuenta?</a>
    </div>
</body>
</html>