<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/loginRegister.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Learning Platfom</title>
</head>

<body>
    <main>
        <h1>Login</h1>
        <form action="index.php?action=login" method="post">
            <div class="input-box">
                <input type="text" name="email" id="" placeholder="Email">
                <input type="password" name="contrasena" id="" placeholder="Password">
                <input type="submit" value="LOG IN">
            </div>
            <div class="register-field">
                <div class="or">
                    <div class="line"></div>
                    <h1>OR</h1>
                    <div class="line"></div>
                </div>
                <a href="index.php?action=register" id="register">REGISTER</a>
            </div>
        </form>
    </main>
</body>

</html>