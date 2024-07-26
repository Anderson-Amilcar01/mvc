<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejemplo MVC</title>
</head>
<body>
    <h1>Ejemplo MVC: Lista de tareas</h1>
    <h2>Desarrollo de sofware</h2>
    <br>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($tasks as $task): ?>
                <tr>
                    <td><p><strong>Usuario:</strong> <?=$task['Asignado'] ?></p></td>
                    <td><p><strong>Actividad asignada:</strong> <?=$task['title']; ?></p></td>
                    <td><p><strong>Fecha de creación:</strong> <?=$task['Created_at']; ?></p></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <p><a href='index.php?action=createpdf'>generar pdf</a></p>
        </table>
</body>
</html>