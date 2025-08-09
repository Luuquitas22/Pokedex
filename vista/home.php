<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/header.css">
    <link rel="stylesheet" href="../estilos/main.css">
    <title>Pokedex</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="titulo">
                <h1>Pokedex</h1>
            </div>
            <div class="botones">
                <button onclick="location.href='vista/login.php'">Ingresar</button>
                <button onclick="location.href='vista/registrarse.php'">Registrarse</button>
            </div>
        </div>
    </header>
    <main>
        <article class="contenedor-buscar-pokemon">
            <div class="texto-buscar">
                <h2>Buscar Pokemon:</h2>
            </div>
            <div class="buscar-pokemon">
                <form action="index.php?action=editar" method="post">
                    <input type="text" name="busqueda" placeholder="Nombre, ID o Tipo" id="buscador">
                    <input type="submit" value="Buscar Pokémon" id="enviar">
                </form>
            </div>
        </article>
        <article class="contenedor-cards">
            <?php if (isset($pokemones) && !empty($pokemones)): ?>
                <?php foreach ($pokemones as $pokemon): ?>
                    <div class="card">
                        <div class="img-container">
                            <img src="<?php echo htmlspecialchars($pokemon['imagen']); ?>" alt="<?php echo htmlspecialchars($pokemon['nombre']); ?>">
                        </div>
                        <h3><?php echo htmlspecialchars($pokemon['nombre']); ?></h3>
                        <p>ID: <?php echo htmlspecialchars($pokemon['id']); ?></p>
                        <p>Tipo: <?php echo htmlspecialchars($pokemon['tipo1']); ?></p>
                        <p><?php echo htmlspecialchars($pokemon['descripcion']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay Pokémon disponibles.</p>
            <?php endif; ?>
        </article>
    </main>
</body>
</html>