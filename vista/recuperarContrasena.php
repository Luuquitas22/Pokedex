<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/login-registrarse.css">
    <title>Pokedex</title>
</head>
<body>
    <main>
        <form action="/index.php?action=recuperarContrasena" method="post">
            <h1>Recuperar contraseña</h1>
            <label for="identificador">Usuario o Email:</label>
            <input type="text" id="identificador" name="identificador" required>
            <br>
            <label for="password">Nueva Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Recuperar Contraseña">
        </form>
    </main>
</body>
</html>