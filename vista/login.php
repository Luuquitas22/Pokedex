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
        <h1>Login</h1>
        <form action="index.php?action=usuarioLogin" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Ingresar">
        </form>
        <p>¿No tienes una cuenta? <a href="registrarse.php">Registrarse</a></p>
    </main>
</body>
</html>