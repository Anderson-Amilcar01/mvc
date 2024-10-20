<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Send Email</title>
</head>
<body>    

    <script>
        // Configuración de los datos para enviar el correo electrónico
        var data = {
            service_id: 'service_33ph83j',
            template_id: 'template_wytx67n',
            user_id: 'Ew5g2Ivv4xKihTVXo',
            template_params: {
                'email': <?= json_encode($emailSent) ?>,
                'name': <?= json_encode($nameSent) ?>,
                'code': <?= $codeSent ?>
            }
        };

        // Realizar la solicitud AJAX para enviar el correo electrónico
        $.ajax('https://api.emailjs.com/api/v1.0/email/send', {
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json'
        })
        .done(function () {
            // Redirigir al formulario de verificación en caso de éxito
            location.href = 'index.php?action=verifyCodeForm';
        })
        .fail(function (error) {
            // Mostrar un mensaje de error en caso de falla
            alert('Oops... ' + JSON.stringify(error));
        });
    </script>
    
</body>
</html>
