-- Active: 1714522931264@@127.0.0.1@3306@pokedex
use pokedex;

INSERT INTO pokemon (numero_id, nombre, tipo1, tipo2, descripcion, imagen)
VALUES
    (25, 'Pikachu', 'Eléctrico', NULL, 'Un pequeño roedor eléctrico muy popular.', 'imagenes/pikachu.png'),
    (9, 'Charmander', 'Fuego', NULL, 'Un pequeño dragón de fuego.', 'imagenes/charmander.png'),
    (15, 'Beedrill', 'Bicho', 'Veneno', 'Un Pokémon insecto muy agresivo.', 'imagenes/beedrill.png'),
    (252, 'Chikorita', 'Planta', NULL, 'Un Pokémon planta con una hoja en la cabeza.', 'imagenes/chikorita.png'),
    (150, 'Mewtwo', 'Psíquico', NULL, 'Un Pokémon legendario creado por la ciencia.', 'imagenes/mewtwo.png'),
    (100, 'Voltorb', 'Eléctrico', NULL, 'Una Pokébola con forma de Pokémon.', 'imagenes/voltorb.png'),
    (133, 'Eevee', 'Normal', NULL, 'Un Pokémon que puede evolucionar en diferentes formas.', 'imagenes/eevee.png'),
    (255, 'Cyndaquil', 'Fuego', NULL, 'Un Pokémon fuego con una llama en la espalda.', 'imagenes/cyndaquil.png'),
    (78, 'Rapidash', 'Fuego', NULL, 'Un Pokémon caballo de fuego muy rápido.', 'imagenes/rapidash.png'),
    (130, 'Gyarados', 'Agua', 'Volador', 'Un Pokémon dragón muy poderoso.', 'imagenes/gyarados.png');

    ALTER TABLE pokemon DROP COLUMN tipo2;

    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contrasena VARCHAR(255) NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
